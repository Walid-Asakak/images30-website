<?php

namespace Controllers;
use Repositories\CartRepository;

class CartController {

    public function showCart() {
        // Check if the user is connected
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        $cartRepository = new CartRepository();

        $cartItems = $cartRepository->findAllCartItemsByUserId($userId);

        // Total price per type of items & total cart price :
        $totalCartPrice = 0;

        foreach($cartItems as $cartItem) {
            $totalCartPrice += $cartItem['price'] * $cartItem['quantity'];
        }

        $view = 'views/cart/cartView.php';
        include 'views/layoutView.php';
    }

    public function addToCart(): void {

        // Check if the user is connected
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $dvdId = (int) $_POST['dvd_id'];
        $quantity = (int) $_POST['quantity'];
    
        $cartRepository = new CartRepository();
    
        $cartRepository->addItemToCart($userId, $dvdId, $quantity);
    
        header('Location: index.php?page=cart');
        exit;
    }

    public function updateCart(): void {

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    
        $userId = $_SESSION['user_id'];
    
        $cartItemId = (int) $_POST['cart_item_id'];
        $quantity = (int) $_POST['quantity'];
    
        if ($quantity < 1) {
            $quantity = 1;
        }
    
        $cartRepository = new CartRepository();
    
        $cartRepository->updateCartItemQuantity(
            $cartItemId,
            $userId,
            $quantity
        );
    
        header('Location: index.php?page=cart');
        exit;
    }

    public function removeFromCart(): void {

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    
        $userId = $_SESSION['user_id'];
        $cartItemId = (int) $_GET['id'];
    
        $cartRepository = new CartRepository();
    
        $cartRepository->removeCartItem($cartItemId, $userId);
    
        header('Location: index.php?page=cart');
        exit;
    }
}