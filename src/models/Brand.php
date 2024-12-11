<?php

include_once __DIR__ . '/../Database.php';

class Brand
{
    private $id;
    private $name;
    private $createdAt;
    private $updatedAt;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    // Méthode pour obtenir toutes les marques
    public static function getAll()
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM brand");
        $brands = $stmt->fetchAll(PDO::FETCH_CLASS, 'Brand');

        return $brands;
    }
}
