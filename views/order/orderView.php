<div class="order-details-page">
    <h1><?= $translations['order_number'] ?> <?= $order['id'] ?></h1>

    <div class="order-summary">
        <p><?= $translations['status'] ?> : <?= htmlspecialchars($order['status']) ?></p>

        <p><?= $translations['total'] ?> : <?= number_format($order['total_price'], 2, ',', ' ') ?> €</p>

        <p><?= $translations['order_date'] ?> : <?= (new DateTime($order['created_at']))->format('d/m/Y à H:i') ?></p>
    </div>

    <div class="delivery-infos">
        <h2><?= $translations['delivery_information'] ?></h2>

        <p><?= $translations['firstname_order'] ?> : <?= htmlspecialchars($order['firstname']) ?></p>

        <p><?= $translations['lastname_order'] ?> : <?= htmlspecialchars($order['lastname']) ?></p>

        <p><?= $translations['email_order'] ?> : <?= htmlspecialchars($order['email']) ?></p>

        <p><?= $translations['phone_order'] ?> : <?= htmlspecialchars($order['phone']) ?></p>

        <p> <?= $translations['address_order'] ?> : <?= htmlspecialchars($order['address']) ?></p>

        <p><?= $translations['city_order'] ?> : <?= htmlspecialchars($order['city']) ?></p>

        <p><?= $translations['postal_code_order'] ?> : <?= htmlspecialchars($order['postal']) ?></p>
    </div>

    <?php if (!empty($orderItems)): ?>
        <h2><?= $translations['ordered_items'] ?></h2>

        <div class="order-items">
            <?php foreach ($orderItems as $orderItem): ?>
                <div class="order-item">
                    <img class="order-img"
                        src="public/assets/img/dvd/<?= htmlspecialchars($orderItem['cover_image_url']) ?>"
                        alt="<?= htmlspecialchars($orderItem['title']) ?>"
                    >

                    <div class="order-item-info">
                        
                        <h3><?= htmlspecialchars($orderItem['title']) ?></h3>

                        <p><?= $translations['unit_price'] ?> : <?= number_format($orderItem['unit_price'], 2, ',', ' ') ?> €</p>

                        <p><?= $translations['quantity'] ?> : <?= $orderItem['quantity'] ?></p>

                        <p>
                            <?= $translations['subtotal'] ?> :
                            <?= number_format($orderItem['unit_price'] * $orderItem['quantity'], 2, ',', ' ') ?> €
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <p class="order-error"><?= $translations['order_error'] ?></p>
    <?php endif; ?>
</div>