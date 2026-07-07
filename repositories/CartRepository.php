<?php

namespace Repositories;
use Services\Database;
use PDO;

class CartRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb(); 
    }

    // Method to insert a new item into the user's cart
    private function createCartItem(int $userId, int $dvdId, int $quantity): void {
        $request = $this->pdo->prepare("
            INSERT INTO cart_items (user_id, dvd_id, quantity)
            VALUES (:userId, :dvdId, :quantity)
        ");
        
        $request->execute([
            ':userId' => $userId,
            ':dvdId' => $dvdId,
            ':quantity' => $quantity,
        ]);
    }

    // Method to check if the item is already in the cart
    public function findItemInCart(int $userId, int $dvdId) : ?array {
        $request = $this -> pdo -> prepare("SELECT * FROM cart_items WHERE user_id = :user_id AND dvd_id = :dvd_id");

        $request -> execute([
            ':user_id' => $userId,
            ':dvd_id' => $dvdId,
        ]);

        $result = $request -> fetch(PDO::FETCH_ASSOC);

        // Return the cart item else we return null
        return $result ?: null;
    }

    // Method to increase the quantity of an existing cart item
    private function increaseCartItemQuantity(int $userId, int $dvdId, int $quantity): void {
        $request = $this->pdo->prepare("
            UPDATE cart_items
            SET quantity = quantity + :quantity
            WHERE user_id = :user_id
            AND dvd_id = :dvd_id
        ");
    
        $request->execute([
            ':quantity' => $quantity,
            ':user_id' => $userId,
            ':dvd_id' => $dvdId,
        ]);
    }

    // Method to add an item to the cart or increase its quantity if it already exists in the cart
    public function addItemToCart(int $userId, int $dvdId, int $quantity): void {
        $cartItem = $this->findItemInCart($userId, $dvdId);
        
        if ($cartItem) {
            $this -> increaseCartItemQuantity($userId, $dvdId, $quantity);
            return;
        }

        $this -> createCartItem($userId, $dvdId, $quantity);
    }

    // Method to retrieve all items from a user's cart
    public function findAllCartItemsByUserId(int $userId): array {
        $request = $this->pdo->prepare("
                SELECT
                    cart_items.id,
                    cart_items.quantity,
                    dvds.id AS dvd_id,
                    dvds.title,
                    dvds.price,
                    dvds.cover_image_url,
                    dvds.stock
                FROM cart_items
            INNER JOIN dvds
                ON cart_items.dvd_id = dvds.id
            WHERE cart_items.user_id = :user_id
        ");
        
        $request->execute([
            ':user_id' => $userId,
        ]);
        
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to calculate the total price of a user's cart
    public function getCartTotalPrice(int $userId): float {
        $request = $this -> pdo-> prepare("
            SELECT SUM(dvds.price * cart_items.quantity) AS total
            FROM cart_items
            INNER JOIN dvds
                ON cart_items.dvd_id = dvds.id
            WHERE cart_items.user_id = :user_id
        ");

        $request->execute([
            ':user_id' => $userId,
        ]);

        $result = $request->fetch(PDO::FETCH_ASSOC);

        return (float) ($result['total'] ?? 0);
    }

    // Function used to remove all items from a user's cart
    public function clearCartItems(int $userId): void {
        $request = $this->pdo->prepare("
            DELETE FROM cart_items
            WHERE user_id = :user_id
        ");

        $request -> execute([
            ':user_id' => $userId,
        ]);
    }

    // Method to update items quantity in the cart
    public function updateCartItemQuantity(int $cartItemId, int $userId, int $quantity): void {
    
        $request = $this->pdo->prepare("
            UPDATE cart_items
            SET quantity = :quantity
            WHERE id = :id
            AND user_id = :user_id
        ");
    
        $request->execute([
            ':quantity' => $quantity,
            ':id' => $cartItemId,
            ':user_id' => $userId,
        ]);
    }

    // Method to remove one item from a user's cart
    public function removeCartItem(int $cartItemId, int $userId): void {

        $request = $this->pdo->prepare("
            DELETE FROM cart_items
            WHERE id = :id
            AND user_id = :user_id
        ");

        $request->execute([
            ':id' => $cartItemId,
            ':user_id' => $userId,
        ]);
    }
}
