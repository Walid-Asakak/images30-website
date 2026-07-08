<div class="register-page auth-page">
    <div class="register-card auth-card">
        <h1><?= $translations['register_title'] ?></h1>
        
        <form method="POST">
            <label for="firstname"><?= $translations['firstname'] ?></label>
            <input type="text" name="firstname" id="firstname" required>

            <label for="lastname"><?= $translations['lastname'] ?></label>
            <input type="text" name="lastname" id="lastname" required>
            
            <label for="email"><?= $translations['email'] ?></label>
            <input type="email" name="email" id="email" required>
            
            <label for="password"><?= $translations['password'] ?></label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit"><?= $translations['register_button'] ?></button>
            <p class="error"><?= $error ?></p>
            <a href="index.php?page=login"><?= $translations['already_account'] ?></a></p>
        </form>
    </div>
</div>