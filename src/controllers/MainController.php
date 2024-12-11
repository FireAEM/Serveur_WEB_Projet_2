<?php

include_once __DIR__ . '/../models/Brand.php';
include_once __DIR__ . '/../models/Category.php';
include_once __DIR__ . '/../models/Product.php';
include_once __DIR__ . '/../models/Type.php';

class MainController
{
    // Page d'accueil
    public function home()
    {
        $categories = Category::getAll();
        $brands = Brand::getAll();

        // Débogage
        // dump($categories);
        // dump($brands);

        $this->render('home', ['categories' => $categories, 'brands' => $brands]);
    }

    // Page des produits avec filtre de catégorie ou de marque
    public function products()
    {
        $categoryId = $_GET['category_id'] ?? null;
        $brandId = $_GET['brand_id'] ?? null;

        if ($categoryId) {
            $products = Product::getByCategory($categoryId);
        } elseif ($brandId) {
            $products = Product::getByBrand($brandId);
        } else {
            $products = Product::getAll();
        }

        $this->render('products', ['products' => $products]);
    }

    // Page d'un produit spécifique
    public function product()
    {
        $productId = $_GET['id'] ?? null;
        if ($productId) {
            $product = Product::getById($productId);
            $this->render('product', ['product' => $product]);
        } else {
            $this->notFound();
        }
    }

    // Page du panier
    public function cart()
    {
        $this->render('cart');
    }

    // Page de connexion
    public function login()
    {
        $this->render('login');
    }

    // Page d'inscription
    public function register()
    {
        $this->render('register');
    }

    // Page 404
    public function notFound()
    {
        http_response_code(404);
        # echo "404 - Page Not Found!";
        $this->render('404');
    }

    // Méthode pour inclure une vue
    private function render($view, $data = [])
    {
        // Transmet les données aux vues
        extract($data);

        // Inclut la vue demandée
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            include_once $viewFile;
        } else {
            echo "View not found: $view";
        }
    }
}
