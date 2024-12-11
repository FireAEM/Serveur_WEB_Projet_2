<?php
    include "partials/header.php";
?>

<div class="home productDetails">
    <div class="productDetailsImg">
        <img src="<?= htmlspecialchars($product->getPicture()) ?>" alt="<?= htmlspecialchars($product->getName()) ?>">
    </div>
    <div class="productDetailsFeatures">
        <h1><?= htmlspecialchars($product->getName()) ?></h1>
        <p><?= htmlspecialchars($product->getBrand()->getName()) ?></p>
        <p>Note • <?= htmlspecialchars($product->getRate()) ?>/5</p>
        <p>Prix • <?= htmlspecialchars($product->getPrice()) ?> €</p>
        <p><?= htmlspecialchars($product->getDescription()) ?></p>
        <form action="index.php?page=add_to_cart" method="POST">
            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product->getId()) ?>">
            <input type="hidden" name="quantity" value="1" min="1">
            <button type="submit">Ajouter au panier</button>
        </form>
    </div>
</div>

<?php
    include "partials/footer.php";
?>
