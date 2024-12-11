<?php

include_once __DIR__ . '/../Database.php';

class Product
{
    private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $createdAt;
    private $updatedAt;
    private $brandId;
    private $categoryId;
    private $typeId;

    // Méthode pour obtenir tous les produits avec mappage explicite
    public static function getAll()
    {
        $db = Database::getInstance();
        $stmt = $db->query("
            SELECT
                id AS id,
                name AS name,
                description AS description,
                picture AS picture,
                price AS price,
                rate AS rate,
                status AS status,
                created_at AS createdAt,
                updated_at AS updatedAt,
                brand_id AS brandId,
                category_id AS categoryId,
                type_id AS typeId
            FROM product
        ");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    // Méthode pour obtenir un produit par son ID avec mappage explicite
    public static function getById($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT
                id AS id,
                name AS name,
                description AS description,
                picture AS picture,
                price AS price,
                rate AS rate,
                status AS status,
                created_at AS createdAt,
                updated_at AS updatedAt,
                brand_id AS brandId,
                category_id AS categoryId,
                type_id AS typeId
            FROM product
            WHERE id = ?
        ");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetch();
    }

    // Méthode pour obtenir les produits par catégorie
    public static function getByCategory($categoryId)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT
                id AS id,
                name AS name,
                description AS description,
                picture AS picture,
                price AS price,
                rate AS rate,
                status AS status,
                created_at AS createdAt,
                updated_at AS updatedAt,
                brand_id AS brandId,
                category_id AS categoryId,
                type_id AS typeId
            FROM product
            WHERE category_id = ?
        ");
        $stmt->execute([$categoryId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    // Méthode pour obtenir les produits par marque
    public static function getByBrand($brandId)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT
                id AS id,
                name AS name,
                description AS description,
                picture AS picture,
                price AS price,
                rate AS rate,
                status AS status,
                created_at AS createdAt,
                updated_at AS updatedAt,
                brand_id AS brandId,
                category_id AS categoryId,
                type_id AS typeId
            FROM product
            WHERE brand_id = ?
        ");
        $stmt->execute([$brandId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getRate() {
        return $this->rate;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getBrandId() {
        return $this->brandId;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function getTypeId() {
        return $this->typeId;
    }

    // Méthode pour obtenir la marque associée
    public function getBrand() {
        if (!$this->brandId) {
            echo 'Erreur : brandId est NULL pour le produit ID ' . $this->id . '<br>';
            return null;
        }

        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM brand WHERE id = ?");
        $stmt->execute([$this->brandId]);
        $brand = $stmt->fetchObject('Brand');
        if ($brand) {
            return $brand;
        } else {
            echo 'Erreur : Marque non trouvée pour le produit ID ' . $this->id . ' avec le brandId ' . $this->brandId . '<br>';
            return null;
        }
    }
}
