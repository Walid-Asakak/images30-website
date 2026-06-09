<section class="dvd-payment">
    <h1>Commander le DVD</h1>
    <h2>Veuillez saisir les informations de livraison</h2>

    <!-- ERROR MESSAGE -->
    <?php if (!empty($error)): ?>
        <div class="error-message">
            <p class ="error"><?= htmlspecialchars($error) ?></p>
        </div>
    <?php endif; ?>

    <!-- PRODUCT SUMMARY -->
    <div class="order-summary">
        <p>Produits : DVD - 2024, les toits de Paris en Seine</p>
        <p>Prix : 35,00€</p>
    </div>

    <!-- FORM -->
    <form action="index.php?page=payment-process" method="POST" class="payment-form">
        <div class="form-group">
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" required value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" required value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" required value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" required value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" id="city" name="city" required value="<?= htmlspecialchars($_POST['city'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="postal">Code postal</label>
            <input type="text" id="postal" name="postal" required
                   value="<?= htmlspecialchars($_POST['postal'] ?? '') ?>">
        </div>

        <!-- RGPD -->
        <div class="form-group consent-group">
            <input type="checkbox" id="consent" name="consent" required>
            <label for="consent">
                J'accepte que mes données personnelles soient collectées et utilisées
                pour traiter ma commande et l'expédition du DVD.
            </label>
        </div>

        <button type="submit">Procéder au paiement</button>
    </form>
</section>