<section class="checkout-page">
    <h1><?= $translations['delivery'] ?></h1>

    <form action="index.php?page=checkout-process" method="POST">

        <input type="text" name="firstname" placeholder="<?= $translations['firstname-delivery'] ?>" required>
        <input type="text" name="lastname" placeholder="<?= $translations['lastname-delivery'] ?>" required>

        <input type="email" name="email" placeholder="<?= $translations['email-delivery'] ?>" required>
        <input type="text" name="phone" placeholder="<?= $translations['phone-delivery'] ?>" required>

        <input type="text" name="address" placeholder="<?= $translations['address-delivery'] ?>" required>
        <input type="text" name="city" placeholder="<?= $translations['city-delivery'] ?>" required>
        <input type="text" name="postal" placeholder="<?= $translations['postal_code-delivery'] ?>" required>

        <button type="submit"><?= $translations['proceed_payment'] ?></button>

    </form>
</section>