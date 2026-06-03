<div class="register-page auth-page">
    <div class="register-card auth-card">
        <h1>Inscription</h1>
        
        <form method="POST">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname" required>

            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">S'inscrire</button>
            <p class="error"><?= $error ?></p>
            <a href="index.php?page=login">Déjà un compte ?</a></p>
        </form>
    </div>
</div>