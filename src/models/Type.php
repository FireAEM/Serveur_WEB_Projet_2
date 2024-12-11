<?php

include_once __DIR__ . '/../Database.php';

class Type
{
    private $id;
    private $name;
    private $createdAt;
    private $updatedAt;

    // Méthode pour obtenir tous les types
    public static function getAll()
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM type");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Type');
    }

    // Méthode pour obtenir un type par son ID
    public static function getById($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM type WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Type');
    }
}
