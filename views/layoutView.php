<!DOCTYPE html>
<html lang="fr">
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
    
    <title>Studio Cinéma Joël Daguerre</title>
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
                <span class="search-toggle">Rechercher</span>
                <i class="fa-solid fa-xmark search-close"></i>

                <div class="search-menu">
                    <form method="GET" action="index.php">
                        <input type="hidden" name="page" value="search">

                        <input type="text" name="search" placeholder="Rechercher des films, documentaires ou évènements">

                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="change-language">
                <span class="language-toggle">Langue</span>
                <i class="fa-solid fa-xmark language-close"></i>

                <div class="language-menu">
                    <a href="">
                        <img src="public/assets/img/flags/flag-fr.png" alt="">
                        Français
                    </a>

                    <a href="">
                        <img src="public/assets/img/flags/flag-en.png" alt="">
                        English
                    </a>

                    <a href="">
                        <img src="public/assets/img/flags/flag-spanish.png" alt="">
                        Español
                    </a>

                    <a href="">
                        <img src="public/assets/img/flags/flag-china.png" alt="">
                        中文
                    </a>

                    <a href="">
                        <img src="public/assets/img/flags/flag-italiano.png" alt="">
                        Italiano
                    </a>
                </div>
            </div>

        </div>

    </div>

    <nav class="nav-links">

        <?php if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true): ?>
            <a href="index.php?page=login">CONNEXION</a>
        <?php endif; ?>
 
        <a href="index.php?page=cinema">CINÉMA</a>
        <a href="index.php?page=communication">COMMUNICATION</a> 
        <a href="index.php?page=distribution">DIFFUSION</a>         
        <a href="index.php?page=team">ÉQUIPE</a>
        <a href="index.php?page=events">ÉVÈNEMENTS</a>
        <a href="index.php?page=dvd" class="buy-dvd">
            ACHETER LE DVD
        </a>

        <?php if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true): ?>
            <a href="index.php?page=logout">DÉCONNEXION</a>
        <?php endif; ?>

    </nav>

    <div class="website-logo-title">
        <a href="index.php?page=home">
            <img src="public/assets/img/logo.png" alt="Logo Studio Cinéma">
        </a>

        <h1>Studio Cinéma Joël Daguerre</h1>
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
            <h4>Navigation</h4>
            <ul>
                <li><a href="index.php?page=home">ACCUEIL</a></li>
                <li><a href="index.php?page=cinema">CINÉMA</a></li>
                <li><a href="index.php?page=communication">COMMUNICATION</a></li>
                <li><a href="index.php?page=distribution">DIFFUSION</a></li>
                <li><a href="index.php?page=team">ÉQUIPE</a></li>
                <li><a href="index.php?page=events">ÉVÈNEMENTS</a></li>
                <li><a href="index.php?page=dvd">ACHETER LE DVD</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Contact</h4>

            <p>
                Email :
                <a href="mailto:jdaguerrej@gmail.com">jdaguerrej@gmail.com</a>
            </p>

            <p>
                Téléphone :
                <a href="tel:+33749101684">07 49 10 16 84</a>
            </p>

            <p>
                Paris 14, France
            </p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© <?= date('Y') ?> Studio Cinéma Joël Daguerre — Tous droits réservés</p>
    </div>
</footer>

</body>
</html>