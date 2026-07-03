<section class="documentaries-page">

    <h1>Documentaires</h1>

    <?php if (empty($documentaries)): ?>

        <p>Aucun documentaire n'est disponible pour l'instant.</p>

    <?php else: ?>

        <?php foreach ($documentaries as $documentary): ?>

            <article class="documentary-card">
                <h2><?= htmlspecialchars($documentary['title']) ?></h2>

                <?php if (!empty($documentary['description'])): ?>
                    <p><?= htmlspecialchars($documentary['description']) ?></p>
                <?php endif; ?>

                <a href="index.php?page=documentary-detail&id=<?= $documentary['id'] ?>">
                    Voir le documentaire
                </a>
            </article>

        <?php endforeach; ?>

    <?php endif; ?>

</section>