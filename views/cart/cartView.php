<h1>Mon panier</h1>

<?php if (empty($cartItems)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>

    <?php foreach ($cartItems as $cartItem): ?>
        <div>
            <h2><?= htmlspecialchars($cartItem['title']) ?></h2>

            <p>Prix : <?= $cartItem['price'] ?> €</p>

            <p>Quantité : <?= $cartItem['quantity'] ?></p>

            <p>
                Sous-total :
                <?= $cartItem['price'] * $cartItem['quantity'] ?> €
            </p>
        </div>
    <?php endforeach; ?>

    <hr>

    <h3>
        Total : <?= $totalCartPrice ?>€
    </h3>

    <a href="index.php?page=checkout">
        Passer à la livraison
    </a>

<?php endif; ?>