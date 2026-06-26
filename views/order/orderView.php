<div class="order-details-page">
    <h1>Commande n°<?= $order['id'] ?></h1>

    <div class="order-summary">
        <p>Statut : <?= htmlspecialchars($order['status']) ?></p>

        <p>Total : <?= number_format($order['total_price'], 2, ',', ' ') ?> €</p>

        <p>Commande effectuée le : <?= (new DateTime($order['created_at']))->format('d/m/Y à H:i') ?></p>
    </div>

    <div class="delivery-infos">
        <h2>Informations de livraison</h2>

        <p>Prénom : <?= htmlspecialchars($order['firstname']) ?></p>

        <p>Nom : <?= htmlspecialchars($order['lastname']) ?></p>

        <p>Email : <?= htmlspecialchars($order['email']) ?></p>

        <p>Téléphone : <?= htmlspecialchars($order['phone']) ?></p>

        <p>Adresse : <?= htmlspecialchars($order['address']) ?></p>

        <p>Ville : <?= htmlspecialchars($order['city']) ?></p>

        <p>Code postal : <?= htmlspecialchars($order['postal']) ?></p>
    </div>

    <?php if (!empty($orderItems)): ?>
        <h2>Articles commandés</h2>

        <div class="order-items">
            <?php foreach ($orderItems as $orderItem): ?>
                <div class="order-item">
                    <img class="order-img"
                        src="public/assets/img/dvd/<?= htmlspecialchars($orderItem['cover_image_url']) ?>"
                        alt="<?= htmlspecialchars($orderItem['title']) ?>"
                    >

                    <div class="order-item-info">
                        
                        <h3><?= htmlspecialchars($orderItem['title']) ?></h3>

                        <p>Prix unitaire : <?= number_format($orderItem['unit_price'], 2, ',', ' ') ?> €</p>

                        <p>Quantité : <?= $orderItem['quantity'] ?></p>

                        <p>
                            Sous-total :
                            <?= number_format($orderItem['unit_price'] * $orderItem['quantity'], 2, ',', ' ') ?> €
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <p class="order-error">Erreur : Aucun article trouvé pour cette commande.</p>
    <?php endif; ?>
</div>