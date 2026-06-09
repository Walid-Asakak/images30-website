<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous">
    <script src="public/js/script.js" defer></script>
    <title>Document</title>
</head>

<body>
<header class="website-header">

    <div class="header-top">

        <div class="burger-menu">
            <i class="fa-solid fa-bars burger-icon"></i>
            <span>Menu</span>
        </div>

        <nav class="nav-links">

            <!-- Connexion (uniquement si pas connecté) -->
            <?php if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true): ?>
                <a href="index.php?page=login">CONNEXION</a>
            <?php endif; ?>

            <a href="index.php?page=team">ÉQUIPE</a>
            <a href="index.php?page=services">SERVICES</a>
            <a href="index.php?page=cinema">CINÉMA</a>
            <a href="index.php?page=events">ÉVÈNEMENTS</a>

            <!-- Mon compte juste avant DVD -->
            <?php if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true): ?>
                <a href="index.php?page=myAccount">MON COMPTE</a>
            <?php endif; ?>

            <a href="index.php?page=dvd" class="buy-dvd">ACHETER LE DVD</a>

            <!-- Déconnexion en dernier -->
            <?php if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true): ?>
                <a href="index.php?page=logout">DÉCONNEXION</a>
            <?php endif; ?>

        </nav>

        <div class="header-right">

            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class="search-toggle">Rechercher</span>
                <i class="fa-solid fa-xmark search-close"></i>

                <div class="search-menu">
                    <form method="GET">
                        <input type="text" name="search" placeholder="Rechercher un film ou évènement...">
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
                    <a href=""><img src="public/assets/img/flag-fr.png">Français</a>
                    <a href=""><img src="public/assets/img/flag-en.png">English</a>
                    <a href=""><img src="public/assets/img/flag-spanish.png">Español</a>
                    <a href=""><img src="public/assets/img/flag-china.png">中文</a>
                    <a href=""><img src="public/assets/img/flag-italiano.png">Italiano</a>
                </div>
            </div>

        </div>

    </div>

    <div class="website-logo-title">
        <img src="public/assets/img/logo-test.png" alt="">
        <h1>Studio Cinéma Joël Daguerre</h1>
    </div>

</header>

<main>
    <?php include $view; ?>
</main>

<footer>

</footer>

</body>
</html>