<section class="protected-section">
    <div class="protected-section-container">

        <h1>><?= $translations['protected_title'] ?></h1>

        <p>
            <?= $translations['protected_description'] ?>
        </p>

        <?php if (!empty($error)): ?>
            <div class="protected-section-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="index.php?page=protected-section-auth&section=<?= urlencode($sectionKey) ?>&id=<?= $id ?>" method="POST">
            <label for="password"><?= $translations['password'] ?></label>
            <input type="password" name="password" id="password" placeholder="<?= $translations['password_placeholder'] ?>" required>

            <button type="submit">
                <?= $translations['access_content'] ?>
            </button>
        </form>

    </div>
</section>