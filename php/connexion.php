<?php

$host = 'localhost';
$dbname = 'library';
$username = 'root';
$port = 3306;
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);//Pour récupérer notre base de donnée
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

 session_start();

?>