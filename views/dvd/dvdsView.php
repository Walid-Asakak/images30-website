<?php foreach ($dvds as $dvd): ?>
    <h2><?= htmlspecialchars($dvd->getTitle()) ?></h2>
    <p><?= htmlspecialchars($dvd->getDescription()) ?></p>
    <p><?= $dvd->getPrice() ?> €</p>

    <form action="index.php?page=add-to-cart" method="POST">
        <input type="hidden" name="dvd_id" value="<?= $dvd->getId() ?>">
        
        <input type="number" name="quantity"  value="1" min="1">
        
        <button type="submit">Ajouter au panier</button>
    </form>
<?php endforeach; ?>