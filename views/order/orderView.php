<h1>Commande n°<?= $order['id'] ?></h1>

<p>Statut : <?= htmlspecialchars($order['status']) ?></p>

<p>Total : <?= number_format($order['total_price'], 2, ',', ' ') ?> €</p>

<p>Date : <?= htmlspecialchars($order['created_at']) ?></p>

<hr>

<h2>Informations de livraison</h2>

<p>Prénom : <?= htmlspecialchars($order['firstname']) ?></p>

<p>Nom : <?= htmlspecialchars($order['lastname']) ?></p>

<p>Email : <?= htmlspecialchars($order['email']) ?></p>

<p>Téléphone : <?= htmlspecialchars($order['phone']) ?></p>

<p>Adresse : <?= htmlspecialchars($order['address']) ?></p>

<p>Ville : <?= htmlspecialchars($order['city']) ?></p>

<p>Code postal : <?= htmlspecialchars($order['postal']) ?></p>

<hr>

<?php if (!empty($orderItems)): ?>
    <h2>Articles commandés</h2>
    
    <?php foreach ($orderItems as $orderItem): ?>
        <div>
            <h3><?= htmlspecialchars($orderItem['title']) ?></h3>
            
            <p>Prix unitaire : <?= number_format($orderItem['unit_price'], 2, ',', ' ') ?> €</p>

            <p>Quantité : <?= $orderItem['quantity'] ?></p>

            <p>
                Sous-total :
                <?= number_format($orderItem['unit_price'] * $orderItem['quantity'], 2, ',', ' ') ?> €
            </p>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>Erreur : Aucun article trouvé pour cette commande.</p>
<?php endif; ?>