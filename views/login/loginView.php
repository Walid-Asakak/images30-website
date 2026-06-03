<div class="login-page auth-page">
    <div class="login-card auth-card">
        <h1>Connexion</h1>
        
        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">Se connecter</button>
            <p class="error"><?= $error ?></p>
            <a href="index.php?page=register">Pas de compte ?</a></p>
        </form>
    </div>
</div>