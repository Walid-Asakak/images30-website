<div class="cart-page">
    <h1><?= $translations['my_cart'] ?></h1>

    <?php if (empty($cartItems)): ?>
        <p class="cart-empty"><?= $translations['cart_empty'] ?></p>
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

                        <p class="cart-price"><?= $translations['price'] ?> : <?= $cartItem['price'] ?> €</p>

                        <form action="index.php?page=update-cart" method="POST">

                            <input 
                                type="hidden" 
                                name="cart_item_id" 
                                value="<?= $cartItem['id'] ?>"
                            >

                            <label>
                                <?= $translations['quantity_cart'] ?> :
                                <input 
                                    type="number"
                                    name="quantity"
                                    value="<?= $cartItem['quantity'] ?>"
                                    min="1"
                                >
                            </label>

                            <button type="submit">
                                <?= $translations['modify'] ?>
                            </button>
                        </form>

                        <p class="cart-subtotal">
                            <?= $translations['subtotal_cart'] ?> :
                            <?= $cartItem['price'] * $cartItem['quantity'] ?> €
                        </p>

                        <a class="cart-remove"
                            href="index.php?page=remove-from-cart&id=<?= $cartItem['id'] ?>">
                                <?= $translations['remove_all'] ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary">
            <h3 class="cart-total">
                <?= $translations['total_cart'] ?> : <?= $totalCartPrice ?>€
            </h3>

            <a href="index.php?page=checkout">
                <?= $translations['go_to_delivery'] ?>
            </a>
        </div>

    <?php endif; ?>
</div>