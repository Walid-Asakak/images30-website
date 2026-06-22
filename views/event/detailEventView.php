<div class="event-detail-page">
    <h1>Galerie <?= htmlspecialchars($event['title']) ?></h1>

    <div class="gallery">
        <?php foreach ($photos as $photo): ?>
            <img
                src="public/assets/img/events/gallery/<?= htmlspecialchars($photo['image_path']) ?>"
                alt="<?= htmlspecialchars($photo['text_alt']) ?>"
            >
        <?php endforeach; ?>
    </div>
</div>