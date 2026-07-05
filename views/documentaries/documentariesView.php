<section class="documentaries-page">

    <h1>Documentaires</h1>

    <?php if (empty($documentaries)): ?>

        <p>Aucun documentaire n'est disponible pour l'instant.</p>

    <?php else: ?>
        <section class="documentaries-list">
            <?php foreach ($documentaries as $documentary): ?>

                <article class="documentary-card">
                    <?php if (!empty($documentary['cover_image'])): ?>
                        <img 
                            src="public/assets/img/documentaries/<?= htmlspecialchars($documentary['cover_image']) ?>" 
                            alt="<?= htmlspecialchars($documentary['title']) ?>"
                            class="documentary-cover"
                        >
                    <?php endif; ?>

                    <h2><?= htmlspecialchars($documentary['title']) ?></h2>

                    <a href="index.php?page=documentary-detail&id=<?= $documentary['id'] ?>">
                        Voir le documentaire
                    </a>
                </article>

            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</section>