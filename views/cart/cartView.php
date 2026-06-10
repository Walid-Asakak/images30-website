<h1>Mon panier</h1>

<?php if (empty($cartItems)): ?>
    <p>Votre panier est vide.</p>
<?php endif; ?>

<?php foreach ($cartItems as $cartItem): ?>
    <div>
        <h2><?= htmlspecialchars($cartItem['title']) ?></h2>

        <p>Prix : <?= $cartItem['price'] ?> €</p>

        <p>Quantité : <?= $cartItem['quantity'] ?></p>

        <p>Total ligne : <?= $cartItem['price'] * $cartItem['quantity'] ?> €</p>
    </div>
<?php endforeach; ?>

<hr>

<h2>Total panier : <?= $totalCartPrice ?> €</h2>