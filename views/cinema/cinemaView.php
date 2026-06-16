<div class="cinema-page">

    <h1>Films</h1>

    <?php if (!empty($moviesInProgress)): ?>
        <h2>Films en cours</h2>

        <div class="cinema-grid">
            <?php foreach ($moviesInProgress as $movie): ?>
                <div class="movie-card">
                    <h3><?= htmlspecialchars($movie['title']) ?></h3>

                    <?php if (!empty($movie['images'])): ?>
                        <a href="index.php?page=cinema-detail&id=<?= $movie['id'] ?>">
                            <img
                                src="public/assets/img/cinema/<?= htmlspecialchars($movie['images'][0]) ?>"
                                alt="<?= htmlspecialchars($movie['title']) ?>"
                            >
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($shortMovies)): ?>
        <h2>Courts métrages</h2>

        <div class="cinema-grid">
            <?php foreach ($shortMovies as $movie): ?>
                <div class="movie-card">
                    <h3><?= htmlspecialchars($movie['title']) ?></h3>

                    <?php if (!empty($movie['images'])): ?>
                        <a href="index.php?page=cinema-detail&id=<?= $movie['id'] ?>">
                            <img
                                src="public/assets/img/cinema/<?= htmlspecialchars($movie['images'][0]) ?>"
                                alt="<?= htmlspecialchars($movie['title']) ?>"
                            >
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($featureFilms)): ?>
        <h2>Longs métrages</h2>

        <div class="cinema-grid">
            <?php foreach ($featureFilms as $movie): ?>
                <div class="movie-card">
                    <h3><?= htmlspecialchars($movie['title']) ?></h3>

                    <?php if (!empty($movie['images'])): ?>
                        <a href="index.php?page=cinema-detail&id=<?= $movie['id'] ?>">
                            <img
                                src="public/assets/img/cinema/<?= htmlspecialchars($movie['images'][0]) ?>"
                                alt="<?= htmlspecialchars($movie['title']) ?>"
                            >
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>