<section class="protected-section">
    <div class="protected-section-container">

        <h1>Accès protégé</h1>

        <p>
            Cette section est protégée. Veuillez entrer le mot de passe pour continuer.
        </p>

        <?php if (!empty($error)): ?>
            <div class="protected-section-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="index.php?page=protected-section-auth&section=<?= urlencode($sectionKey) ?>&id=<?= $id ?>" method="POST">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Entrer le mot de passe" required>

            <button type="submit">
                Accéder au contenu
            </button>
        </form>

    </div>
</section>