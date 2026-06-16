<div class="movie-detail">

    <h1><?= htmlspecialchars($movie['title']) ?></h1>

    <?php if (!empty($movie['images'])): ?>
        <?php foreach ($movie['images'] as $img): ?>
            <img
                src="public/assets/img/cinema/<?= htmlspecialchars($img) ?>"
                alt="<?= htmlspecialchars($movie['title']) ?>"
            >
        <?php endforeach; ?>
    <?php endif; ?>

    <p><?= nl2br(htmlspecialchars($movie['description'])) ?></p>

</div>