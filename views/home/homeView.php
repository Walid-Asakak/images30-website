<div class="home-page">

    <section class="home-intro">
        <h2><?= $translations['who_are_we'] ?></h2>

        <p><?= $translations['home_intro'] ?></p>
    </section>

    <section class="movies-list">
        <h2><?= $translations['our_movies'] ?></h2>

        <div class="movies-container">

            <!-- left arro< -->
            <button class="scroll-btn left" id="scrollLeft">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Scroll container -->
            <div class="movies-scroll" id="moviesScroll">

                <?php foreach ($homeMovies as $homeMovie): ?>

                    <article class="movie-card">
                        <a href="index.php?page=cinema-detail&id=<?= $homeMovie['id'] ?>">
                            <img
                                src="public/assets/img/cinema/<?= htmlspecialchars($homeMovie['images'][0]) ?>"
                                alt="<?= htmlspecialchars($homeMovie['title']) ?>">

                            <h3><?= htmlspecialchars($homeMovie['title']) ?></h3>

                        </a>
                    </article>

                <?php endforeach; ?>

            </div>

            <!-- right arrow -->
            <button class="scroll-btn right" id="scrollRight">
                <i class="fas fa-chevron-right"></i>
            </button>

        </div>

        <a class="discover-more-btn" href="index.php?page=cinema">
            <?= $translations['discover_more'] ?>
        </a>
    </section>

    <section class="services">

        <article class="services-card">
            <div class="services-title">
                <i class="fa-solid fa-video"></i>
                <h3><?= $translations['formulas_services'] ?></h3>
            </div>
            
            <p>
                <?= $translations['formulas_description'] ?>
            </p>

            <a href="index.php?page=formulas-services"><?= $translations['see_more'] ?></a>
        </article>

        <article class="services-card">
            <div class="services-title">
                <i class="fab fa-servicestack"></i>
                <h3><?= $translations['additional_services'] ?></h3>
            </div>

            <p>
                <?= $translations['additional_description'] ?>
            </p>

            <a href="index.php?page=additional-services"><?= $translations['see_more'] ?></a>
        </article>

        <article class="services-card">
            <div class="services-title">
                <i class="fas fa-film"></i>
                <h3><?= $translations['distribution_programs'] ?></h3>
            </div>

            <p>
                <?= $translations['distribution_description'] ?>
            </p>

            <a href="index.php?page=prog-distribution"><?= $translations['see_more'] ?></a>
        </article>

    </section>

    <section class="discover-more">
        <h2><?= $translations['our_documentaries'] ?></h2>

        <div class="discover-grid">
            <?php foreach ($homeDocumentaries as $homeDocumentary): ?>
                <article class="to-discover-card">
                    <a href="index.php?page=documentary-detail&id=<?= $homeDocumentary['id'] ?>">

                        <div class="discover-title">
                            <i class="fas fa-play"></i>
                            <h3><?= htmlspecialchars($homeDocumentary['title']) ?></h3>
                        </div>

                        <img
                            src="public/assets/img/documentaries/<?= htmlspecialchars($homeDocumentary['cover_image']) ?>"
                            alt="<?= htmlspecialchars($homeDocumentary['title']) ?>">

                    </a>
                </article>

            <?php endforeach; ?>
        </div>

        <a class="btn-discover-more-documentaries" href="index.php?page=documentaries">
            <?= $translations['discover_more'] ?>
        </a>
    </section>
</div>