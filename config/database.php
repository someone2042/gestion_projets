<?php

function connectDB()
{

    $host = 'localhost';
    $dbname = 'gestion_projets';
    $username = 'root';
    $password = '';

    try {
        // Création de l'objet PDO pour la connexion à la base de données
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        return $db; // Retourner l'objet de connexion PDO

    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message d'erreur et arrêter le script
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        die(); // Arrêter l'exécution du script en cas d'erreur
    }
}
