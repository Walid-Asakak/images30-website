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
}