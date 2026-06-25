<div class="dvd-grid">
    <?php foreach ($dvds as $dvd): ?>
        <div class="dvd-card">
            <img
                src="public/assets/img/dvd/<?= htmlspecialchars($dvd->getCoverImageDvd()) ?>"
                alt="<?= htmlspecialchars($dvd->getTitle()) ?>"
            >

            <h2>
                <?= htmlspecialchars($dvd->getTitle()) ?>
            </h2>

            <p class="dvd-description">
                <?= htmlspecialchars($dvd->getDescription()) ?>
            </p>

            <p class="dvd-price">
                <?= number_format($dvd->getPrice(), 2) ?> €
            </p>

            <form action="index.php?page=add-to-cart" method="POST">
                <input type="hidden" name="dvd_id" value="<?= $dvd->getId() ?>">

                <input type="number" name="quantity" value="1" min="1">

                <button type="submit">
                    Ajouter au panier
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>