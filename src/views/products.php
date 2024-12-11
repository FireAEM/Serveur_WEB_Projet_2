<?php
    include "partials/header.php";
    include_once __DIR__ . '/../models/Product.php';

    // Récupération des données
    $products = $products ?? [];
?>

<div class="home">
    <h1>Produits</h1>
    <div class="products">
        <?php if (empty($products)): ?>
            <p class="noResults">Aucun produit trouvé.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="productItem" onclick="window.location='/product?id=<?= $product->getId() ?>';">
                    <img src="<?= htmlspecialchars($product->getPicture()) ?>" alt="<?= htmlspecialchars($product->getName()) ?>">
                    <div class="productContent">
                        <h2><?= htmlspecialchars($product->getName()) ?></h2>
                        <p><?= htmlspecialchars($product->getBrand()->getName()) ?></p>
                        <p><?= htmlspecialchars($product->getDescription()) ?></p>
                        <p>Prix : <?= htmlspecialchars($product->getPrice()) ?> €</p>
                        <form action="index.php?page=add_to_cart" method="POST">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product->getId()) ?>">
                            <input type="hidden" name="quantity" value="1" min="1">
                            <button type="submit">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php
    include "partials/footer.php";
?>
