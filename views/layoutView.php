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

    <!-- TOP BAR -->
    <div class="header-top">
        <div class="burger-menu">
            <i class="fa-solid fa-bars burger-icon"></i>
            <span>Menu</span>
        </div>

        <!-- to group the elemnts on the right -->
        <div class="header-right">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i> <!-- search icon -->
                <span class ="search-toggle">Rechercher</span>

                <!-- to close the search bar -->
                <i class="fa-solid fa-xmark search-close"></i>

                <div class="search-menu">
                    <form action="" method="GET">
                        <input type="text" name="search" placeholder="Rechercher un film ou évènement...">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="change-language">
                <span class="language-toggle">Langue</span>

                <!-- icon to close the menu -->
                <i class="fa-solid fa-xmark language-close"></i>

                <div class="language-menu">
                    <a href=""><img src="public/assets/img/flag-fr.png" alt="Français">Français</a>
                    <a href=""><img src="public/assets/img/flag-en.png" alt="English">English</a>
                    <a href=""><img src="public/assets/img/flag-spanish.png" alt="Español">Español</a>
                    <a href=""><img src="public/assets/img/flag-china.png" alt="中文 (中国)">中文 (中国)</a>
                    <a href=""><img src="public/assets/img/flag-italiano.png" alt="Italiano">Italiano</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="nav-links">
        <a href="index.php?page=cinema">CINÉMA</a>
        <a href="index.php?page=events">ÉVÈNEMENTS</a>
        <a href="index.php?page=team">ÉQUIPES</a>
        <a href="index.php?page=services">SERVICES</a>
        <a href="index.php?page=dvd" class="buy-dvd">ACHETER LE DVD</a>
        <a href="index.php?page=login">CONNEXION</a>
    </nav>
</header>

<main>
    <?php include $view; ?>
</main>

<footer>

</footer>

</body>
</html>