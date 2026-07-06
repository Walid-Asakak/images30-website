<section class="search-page">

    <h1>Résultats pour : "<?= htmlspecialchars($search ?? '') ?>"</h1>

    <?php if (empty($movies) && empty($documentaries) && empty($events)): ?>
        <p>Aucun résultat trouvé.</p>
    <?php endif; ?>


    <?php if (!empty($movies)): ?>
        <h2>Films</h2>

        <div class="search-grid">
            <?php foreach ($movies as $movie): ?>
                <article class="search-card">
                    <a href="index.php?page=cinema-detail&id=<?= $movie['id'] ?>">

                        <h3><?= htmlspecialchars($movie['title']) ?></h3>

                        <?php if (!empty($movie['image'])): ?>
                            <img
                                src="public/assets/img/cinema/<?= htmlspecialchars($movie['image']) ?>"
                                alt="<?= htmlspecialchars($movie['title']) ?>"
                            >
                        <?php endif; ?>

                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($documentaries)): ?>
        <h2>Documentaires</h2>

        <div class="search-grid">
            <?php foreach ($documentaries as $doc): ?>
                <article class="search-card">
                    <a href="index.php?page=documentary-detail&id=<?= $doc['id'] ?>">

                        <h3><?= htmlspecialchars($doc['title']) ?></h3>

                        <?php if (!empty($doc['cover_image'])): ?>
                            <img
                                src="public/assets/img/documentaries/<?= htmlspecialchars($doc['cover_image']) ?>"
                                alt="<?= htmlspecialchars($doc['title']) ?>"
                            >
                        <?php endif; ?>

                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($events)): ?>
        <h2>Évènements</h2>

        <div class="search-grid">
            <?php foreach ($events as $event): ?>
                <article class="search-card">
                    <a href="index.php?page=event-detail&id=<?= $event['id'] ?>">

                        <h3><?= htmlspecialchars($event['title']) ?></h3>

                        <?php if (!empty($event['cover_image_url'])): ?>
                            <img
                                src="public/assets/img/events/covers/<?= htmlspecialchars($event['cover_image_url']) ?>"
                                alt="<?= htmlspecialchars($event['title']) ?>"
                            >
                        <?php endif; ?>

                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>