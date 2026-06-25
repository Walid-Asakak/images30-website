<div class="cart-page">
    <h1>Mon panier</h1>

    <?php if (empty($cartItems)): ?>
        <p class="cart-empty">Votre panier est vide.</p>
    <?php else: ?>

        <div class="cart-items">
            <?php foreach ($cartItems as $cartItem): ?>
                <div class="cart-item">
                    <img class="cart-img"
                        src="public/assets/img/dvd/<?= htmlspecialchars($cartItem['cover_image_url']) ?>"
                        alt="<?= htmlspecialchars($cartItem['title']) ?>"
                    >

                    <div class="cart-info">
                        <h2><?= htmlspecialchars($cartItem['title']) ?></h2>

                        <p class="cart-price">Prix : <?= $cartItem['price'] ?> €</p>

                        <p>Quantité : <?= $cartItem['quantity'] ?></p>

                        <p class="cart-subtotal">
                            Sous-total :
                            <?= $cartItem['price'] * $cartItem['quantity'] ?> €
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary">
            <h3 class="cart-total">
                Total : <?= $totalCartPrice ?>€
            </h3>

            <a href="index.php?page=checkout">
                Passer à la livraison
            </a>
        </div>

    <?php endif; ?>
</div>