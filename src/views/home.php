<?php
    include "partials/header.php";
    include_once __DIR__ . '/../models/Brand.php';
    include_once __DIR__ . '/../models/Category.php';

    // Récupération des données
    $brands = Brand::getAll();
    $categories = Category::getAll();
?>

<div class="home index">
    <div class="homeBannerDiv">
        <h1>Accueil</h1>
        <img src="/image/banner.png" alt="Bannière" class="homeBanner">
    </div>

    <div class="homeLinksDiv">
        <h2>Liens pratiques</h2>
        <div class="homeLinksList">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <div class="homeLinks" onclick="window.location='/products?category_id=<?= $category->getId() ?>';">
                        <img src="<?= htmlspecialchars($category->getPicture()) ?>" alt="<?= htmlspecialchars($category->getName()) ?>">
                        <h3><?= htmlspecialchars($category->getName()) ?></h3>
                        <p><?= htmlspecialchars($category->getSubtitle()) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune catégorie disponible.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="homeBrandsDiv">
        <h2>Nos marques</h2>
        <div class="homeBrandsList">
            <?php if (!empty($brands)): ?>
                <?php foreach ($brands as $brand): ?>
                    <div class="homeBrands" onclick="window.location='/products?brand_id=<?= $brand->getId() ?>';">
                        <h3><?= htmlspecialchars($brand->getName()) ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune marque disponible.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
    include "partials/footer.php";
?>
