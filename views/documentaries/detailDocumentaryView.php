<section class="documentary-detail-page">

    <h1><?= htmlspecialchars($documentary['title']) ?></h1>

    <?php if (!empty($documentary['description'])): ?>
        <p><?= nl2br(htmlspecialchars($documentary['description'])) ?></p>
    <?php endif; ?>

    <div class="video-container">

        <iframe
            src="https://player.vimeo.com/video/<?= htmlspecialchars($documentary['vimeo_id']) ?>"
            width="900"
            height="500"
            frameborder="0"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
</section>