<?php

include_once __DIR__ . '/../Database.php';

class Category
{
    private $id;
    private $name;
    private $subtitle;
    private $picture;
    private $homeOrder;
    private $createdAt;
    private $updatedAt;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSubtitle() {
        return $this->subtitle;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getHomeOrder() {
        return $this->homeOrder;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    // Méthode pour obtenir toutes les catégories
    public static function getAll()
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM category");
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');

        return $categories;
    }
}
