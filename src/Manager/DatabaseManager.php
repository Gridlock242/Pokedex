<?php

namespace App\Manager;

use PDO;
use PDOException;

class DatabaseManager
{
    private static ?PDO $pdo = null;
    private static function connectDB(): PDO
    {
        $host = 'localhost';
        $dbName = 'pokedex';
        $user = 'root';
        $password = '';

        try {
            // Renvoie d'un objet PDO ( connexion à la BDD )
            return new PDO(
                "mysql:host=$host;dbname=$dbName;charset=utf8",
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    protected static function getConnexion(): PDO
    {

        //Vérification si la connexion existe
        if (self::$pdo === null) {
            // self::  fait référence l'appel de la classe elle même ( self ) et la récupération d'une propriété statique ( :: ) $pdo

            //  Assignation de la connexion PDO renvoyée par la fonction connectDB() à la propriété statique $pdo
            self::$pdo = self::connectDB();
        }

        // Retourner l'instance de PDO static
        return self::$pdo;
    }
}
