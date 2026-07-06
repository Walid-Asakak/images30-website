<div class="home-page">

    <section class="home-intro">
        <h2>Qui sommes-nous ?</h2>

        <p>
            Studio Cinéma Joël Daguerre est une société spécialisée dans le développement,
            la production et la distribution de films et de séries destinés au marché international.
            Nous concevons des œuvres originales reposant sur des propriétés intellectuelles (IP) fortes,
            pensées pour toucher un public mondial. La majorité de nos productions est tournée en langue
            anglaise afin de favoriser leur diffusion auprès des diffuseurs, plateformes et partenaires
            internationaux. Notre ambition est de créer des contenus à forte valeur artistique et commerciale,
            capables de s'inscrire durablement sur les marchés internationaux. Chaque projet est développé avec
            une exigence de qualité, depuis sa conception jusqu'à sa production et sa distribution, afin de
            répondre aux attentes des acteurs majeurs de l'industrie audiovisuelle.
        </p>
    </section>

    <section class="movies-list">
        <h2>Nos films</h2>

        <div class="movies-container">

            <!-- Flèche gauche -->
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
            Découvrir plus
        </a>
    </section>

    <section class="services">

        <article class="services-card">
            <i class="fa-solid fa-video"></i>
            <h3>FORMULES ET SERVICES</h3>

            <p>
                Nous réalisons des films avec une expertise reconnue dans les documentaires de
                cinéma et les programmes courts.
            </p>

            <a href="index.php?page=formulas-services">Voir plus</a>
        </article>

        <article class="services-card">
            <i class="fab fa-servicestack"></i>
            <h3>SERVICES ADDITIFS</h3>

            <p>
                Nous proposons plusieurs services additionnels afin de parfaire votre demande.
            </p>

            <a href="index.php?page=additional-services">Voir plus</a>
        </article>

        <article class="services-card">
            <i class="fas fa-film"></i>
            <h3>DIFFUSION ET PROGRAMMES</h3>

            <p>
                Nous diffusons la plupart de nos films sur différentes chaînes télévisuelles
                comme TV5 Monde, Luxe TV et d'autres chaînes.
            </p>

            <a href="index.php?page=prog-distribution">Voir plus</a>
        </article>

    </section>

    <section class="discover-more">
        <h2>Nos documentaires</h2>

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
            Découvrir plus
        </a>
    </section>
</div>