<?php
require_once("connexion.php");

header('Content-Type: application/json');

// DEBUG
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée']);
    exit;
}

$donnees = json_decode(file_get_contents('php://input'), true);

if (empty($donnees)) {
    echo json_encode(['status' => 'error', 'message' => 'Aucune donnée reçue']);
    exit;
}

if (!isset($_SESSION['iduser'])) {
    echo json_encode(['status' => 'error', 'message' => 'Utilisateur non connecté']);
    exit;
}


$donnees = json_decode(file_get_contents('php://input'), true);//pourquoi true ?

    try {
        $stmt = $pdo->prepare("INSERT INTO favoris (iduser,idpoke) 
    VALUES(:iduser,:idpoke) "); 
    // les variable avec les : sont comme les paramètres d'une fonction

    foreach ($donnees as $carte) {
        $stmt->execute([
        "iduser" =>$_SESSION["iduser"],
        "idpoke" => $carte['id'],
      
        ]);
    }
    echo json_encode(['status' => 'ok', 'message' => 'Cartes enregistrées']);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


