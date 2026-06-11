<?php

namespace Controllers;

use Repositories\OrderRepository;
use Repositories\CartRepository;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class OrderController{
    public function showOrder(): void {

        // Security : The user must be connected to access to his orders
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        
        $orderId = (int) ($_GET['id'] ?? 0);
    
        $orderRepository = new OrderRepository();
    
        $order = $orderRepository->findOrderById($orderId);

        //We don"t load the view without any orders
        if (!$order) {
            header('Location: index.php?page=home');
            exit;
        }

          // Security : the users connected can"t see any orders that are not theirs by changing the ID
          if ($order['user_id'] !== $_SESSION['user_id']) {
            header('Location: index.php?page=home');
            exit;
        }
    
        $orderItems = $orderRepository->findOrderItemsByOrderId($orderId);
    
        $view = 'views/order/orderView.php';
        include 'views/layoutView.php';
    }
    
    public function checkoutStripe(): void {

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    
        $userId = $_SESSION['user_id'];
    
        $cartRepository = new CartRepository();
        $cartItems = $cartRepository->findAllCartItemsByUserId($userId);
    
        if (empty($cartItems)) {
            header('Location: index.php?page=cart');
            exit;
        }
    
        Stripe::setApiKey($_ENV['STRIPE_PRIVATE_KEY']);
    
        $lineItems = [];
    
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item['title'],
                    ],
                    'unit_amount' => $item['price'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }
    
        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $lineItems,
    
            'success_url' => $_ENV['APP_URL'] . '/index.php?page=order-success',
            'cancel_url' => $_ENV['APP_URL'] . '/index.php?page=cart',
        ]);
    
        header('Location: ' . $session->url);
        exit;
    }

    // To verify if the user is connected & to display the delivery form
    public function checkoutForm(): void {

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    
        $view = 'views/order/checkoutView.php';
        include 'views/layoutView.php';
    }

    // To Process the delivery form & to redirects to Stripe to pay 
    public function checkoutProcess(): void {

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    
        // 1 - Stock the delivery form in the session
        $_SESSION['checkout'] = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
            'phone'     => $_POST['phone'],
            'address'   => $_POST['address'],
            'city'      => $_POST['city'],
            'postal'    => $_POST['postal'],
        ];
    
        $userId = $_SESSION['user_id'];
    
        $cartRepository = new CartRepository();
        $cartItems = $cartRepository->findAllCartItemsByUserId($userId);
    
        if (empty($cartItems)) {
            header('Location: index.php?page=cart');
            exit;
        }
    
    // 2 - Stripe configuration
        Stripe::setApiKey($_ENV['STRIPE_PRIVATE_KEY']);
    
        $lineItems = [];
    
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item['title'],
                    ],
                    'unit_amount' => (int) round($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }
    
        // 3 - To create the session Stripe
        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $lineItems,
    
            'success_url' => $_ENV['APP_URL'] . '/index.php?page=order-success',
            'cancel_url'  => $_ENV['APP_URL'] . '/index.php?page=cart',
        ]);
    
        header('Location: ' . $session->url);
        exit;
    }

    public function orderSuccess(): void {

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    
        if (!isset($_SESSION['checkout'])) {
            header('Location: index.php?page=checkout');
            exit;
        }
    
        $userId = $_SESSION['user_id'];
        $checkout = $_SESSION['checkout'];
    
        $cartRepository = new CartRepository();
        $orderRepository = new OrderRepository();
    
        $cartItems = $cartRepository->findAllCartItemsByUserId($userId);
    
        if (empty($cartItems)) {
            header('Location: index.php?page=home');
            exit;
        }
    
        $totalPrice = $cartRepository->getCartTotalPrice($userId);
    
        $orderId = $orderRepository->createOrder(
            $userId,
            $totalPrice,
            $checkout['firstname'],
            $checkout['lastname'],
            $checkout['email'],
            $checkout['phone'],
            $checkout['address'],
            $checkout['city'],
            $checkout['postal']
        );
    
        foreach ($cartItems as $item) {
            $orderRepository->createOrderItem(
                $orderId,
                $item['dvd_id'],
                $item['quantity'],
                $item['price']
            );
        }
    
        $cartRepository->clearCartItems($userId);
    
        unset($_SESSION['checkout']);
    
        header('Location: index.php?page=order&id=' . $orderId);
        exit;
    }
}