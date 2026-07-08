<!DOCTYPE html>
<html lang="<?= $_SESSION['language'] ?? 'fr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous">

    <script src="public/js/script.js" defer></script>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <title>Joël Daguerre Studio Cinéma</title>
</head>

<body>

<header class="website-header">

    <div class="header-top">

        <div class="burger-menu">
            <i class="fa-solid fa-bars burger-icon"></i>
            <span>Menu</span>
        </div>

        <div class="header-right">

            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class="search-toggle"><?= $translations['search'] ?></span>
                <i class="fa-solid fa-xmark search-close"></i>

                <div class="search-menu">
                    <form method="GET" action="index.php">
                        <input type="hidden" name="page" value="search">

                        <input type="text" name="search" placeholder="<?= $translations['search_placeholder'] ?>">

                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="change-language">
                <span class="language-toggle"><?= $translations['language'] ?></span>
                <i class="fa-solid fa-xmark language-close"></i>

                <div class="language-menu">
                    <a href="index.php?page=change-language&lang=fr">
                        <img src="public/assets/img/flags/flag-fr.png" alt="">
                        Français
                    </a>

                    <a href="index.php?page=change-language&lang=en">
                        <img src="public/assets/img/flags/flag-en.png" alt="">
                        English
                    </a>

                    <a href="index.php?page=change-language&lang=es">
                        <img src="public/assets/img/flags/flag-spanish.png" alt="">
                        Español
                    </a>

                    <a href="index.php?page=change-language&lang=zh">
                        <img src="public/assets/img/flags/flag-china.png" alt="">
                        中文
                    </a>

                    <a href="index.php?page=change-language&lang=it">
                        <img src="public/assets/img/flags/flag-italiano.png" alt="">
                        Italiano
                    </a>
                </div>
            </div>

        </div>

    </div>

    <nav class="nav-links">

        <?php if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true): ?>
            <a href="index.php?page=login"><?= $translations['login'] ?></a>
        <?php endif; ?>
 
        <a href="index.php?page=cinema"><?= $translations['cinema'] ?></a>
        <a href="index.php?page=communication"><?= $translations['communication'] ?></a> 
        <a href="index.php?page=distribution"><?= $translations['distribution'] ?></a>         
        <a href="index.php?page=team"><?= $translations['team'] ?></a>
        <a href="index.php?page=events"><?= $translations['events'] ?></a>
        <a href="index.php?page=dvd" class="buy-dvd">
            <?= $translations['buy_dvd'] ?>
        </a>

        <?php if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true): ?>
            <a href="index.php?page=logout"><?= $translations['logout'] ?></a>
        <?php endif; ?>

    </nav>

    <div class="website-logo-title">
        <a href="index.php?page=home">
            <img src="public/assets/img/logo.png" alt="Logo Studio Cinéma">
        </a>

        <h1>Joël Daguerre Studio Cinéma</h1>
    </div>

</header>

<main>
    <?php include $view; ?>
</main>

<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-column">
            <div class="footer-logo">
                <a href="index.php?page=home">
                    <img src="public/assets/img/logo.png" alt="Logo Studio Cinéma Joël Daguerre">
                </a>
            </div>
        </div>

        <div class="footer-column">
            <h4><?= $translations['navigation'] ?></h4>
            <ul>
                <li><a href="index.php?page=home"><?= $translations['home'] ?></a></li>
                <li><a href="index.php?page=cinema"><?= $translations['cinema'] ?></a></li>
                <li><a href="index.php?page=communication"><?= $translations['communication'] ?></a></li>
                <li><a href="index.php?page=distribution"><?= $translations['distribution'] ?></a></li>
                <li><a href="index.php?page=team"><?= $translations['team'] ?></a></li>
                <li><a href="index.php?page=events"><?= $translations['events'] ?></a></li>
                <li><a href="index.php?page=dvd"><?= $translations['buy_dvd'] ?></a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4><?= $translations['contact'] ?></h4>

            <p>
                <?= $translations['email'] ?> :
                <a href="mailto:jdaguerrej@gmail.com">jdaguerrej@gmail.com</a>
            </p>

            <p>
                <?= $translations['phone'] ?> :
                <a href="tel:+33749101684">07 49 10 16 84</a>
            </p>

            <br>

            <P>Bureau 326</p>
            <p>78 avenue des Champs-Élysées</p>
            <p>75008 Paris - France</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© <?= date('Y') ?> Joël Daguerre Studio Cinéma — <?= $translations['all_rights_reserved'] ?></p>
    </div>
</footer>

</body>
</html>