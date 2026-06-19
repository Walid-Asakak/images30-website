<div class="events-page">
    <h1>Événements</h1>

    <?php foreach ($events as $event): ?>
        <article class="event-card">
            <h2><?= htmlspecialchars($event['title']) ?></h2>

            <a href="index.php?page=event-detail&id=<?= $event['id'] ?>">
                <img
                    src="public/assets/img/events/covers/<?= htmlspecialchars($event['cover_image_url']) ?>"
                    alt="<?= htmlspecialchars($event['title']) ?>"
                >
            </a>
        </article>
    <?php endforeach; ?>
</div>