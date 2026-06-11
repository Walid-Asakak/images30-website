<?php

namespace Repositories;

use Services\Database;
use PDO;

class OrderRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb();
    }

    public function createOrder(int $userId, float $totalPrice, string $firstname, string $lastname, string $email, string $phone, string $address, string $city, string $postal): int {
    
        $request = $this->pdo->prepare("
            INSERT INTO orders (
                user_id,
                total_price,
                firstname,
                lastname,
                email,
                phone,
                address,
                city,
                postal
            )
            VALUES (
                :user_id,
                :total_price,
                :firstname,
                :lastname,
                :email,
                :phone,
                :address,
                :city,
                :postal
            )
        ");
    
        $request->execute([
            ':user_id' => $userId,
            ':total_price' => $totalPrice,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':city' => $city,
            ':postal' => $postal,
        ]);
    
        return (int) $this->pdo->lastInsertId();
    }

    // Function to create a new order item linked to an order
    public function createOrderItem(int $orderId, int $dvdId, int $quantity, float $unitPrice): void {
        $request = $this->pdo->prepare("
            INSERT INTO order_items (
                order_id,
                dvd_id,
                quantity,
                unit_price
            )
            VALUES (
                :order_id,
                :dvd_id,
                :quantity,
                :unit_price
            )
        ");
        
        $request->execute([
            ':order_id' => $orderId,
            ':dvd_id' => $dvdId,
            ':quantity' => $quantity,
            ':unit_price' => $unitPrice,
        ]);
    }

    // Function used to retrieve an order by its id
    public function findOrderById(int $orderId): ?array {
        $request = $this->pdo->prepare("
            SELECT *
            FROM orders
            WHERE id = :order_id
        ");

        $request->execute([
            ':order_id' => $orderId,
        ]);

        $result = $request->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    // Function used to retrieve all items belonging to an order
    public function findOrderItemsByOrderId(int $orderId): array {
        $request = $this->pdo->prepare("
            SELECT
                order_items.id,
                order_items.quantity,
                order_items.unit_price,
                dvds.title
            FROM order_items
            INNER JOIN dvds
                ON order_items.dvd_id = dvds.id
            WHERE order_items.order_id = :order_id
        ");

        $request->execute([
            ':order_id' => $orderId,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}