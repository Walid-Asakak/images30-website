<section class="documentaries-page">

    <h1>Documentaires</h1>

    <?php if (empty($documentariesOrderedByCategory)): ?>

        <p>Aucun documentaire n'est disponible pour l'instant.</p>

    <?php else: ?>

        <?php foreach ($documentariesOrderedByCategory as $category => $documentaries): ?>

            <section class="documentary-category">

                <h2 class="category-title">
                    <?= htmlspecialchars($category) ?>
                </h2>


                <section class="documentaries-list">

                    <?php foreach ($documentaries as $documentary): ?>

                        <article class="documentary-card">

                            <h2>
                                <?= htmlspecialchars($documentary['title']) ?>
                            </h2>


                            <?php if (!empty($documentary['cover_image'])): ?>

                                <img class="cover-img-documentary"
                                    src="public/assets/img/documentaries/<?= htmlspecialchars($documentary['cover_image']) ?>" 
                                    alt="<?= htmlspecialchars($documentary['title']) ?>"
                                >

                            <?php endif; ?>


                            <a href="index.php?page=documentary-detail&id=<?= $documentary['id'] ?>">
                                Voir le documentaire
                            </a>
                        </article>
                    <?php endforeach; ?>
                </section>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</section>