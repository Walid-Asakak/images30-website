<div class="movie-detail">

    <h1><?= htmlspecialchars($movie['title']) ?></h1>

    <?php if (!empty($movie['images'])): ?>
        <div class="movie-gallery">

            <?php if (count($movie['images']) > 1): ?>
                <button class="gallery-btn prev" aria-label="Image précédente">
                    &#10094;
                </button>
            <?php endif; ?>


            <div class="gallery-container">
                <?php foreach ($movie['images'] as $index => $img): ?>
                    <img
                        class="<?= $index === 0 ? 'active' : '' ?>"
                        src="public/assets/img/cinema/<?= htmlspecialchars($img) ?>"
                        alt="<?= htmlspecialchars($movie['title']) ?>"
                    >
                <?php endforeach; ?>
            </div>

            <?php if (count($movie['images']) > 1): ?>
                <button class="gallery-btn next" aria-label="Image suivante">
                    &#10095;
                </button>
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <p><?= nl2br(htmlspecialchars($movie['description'])) ?></p>
</div>