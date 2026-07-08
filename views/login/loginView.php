<div class="login-page auth-page">
    <div class="login-card auth-card">
        <h1><?= $translations['login_title'] ?></h1>
        
        <form action="" method="POST">
            <label for="email"><?= $translations['email'] ?></label>
            <input type="email" name="email" id="email" required>

            <label for="password"><?= $translations['password'] ?></label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit"><?= $translations['login_button'] ?></button>
            <p class="error"><?= $error ?></p>
            <a href="index.php?page=register"><?= $translations['no_account'] ?></a></p>
        </form>
    </div>
</div>