<?php
require_once("connexion.php");

header('Content-Type: application/json');



$donnees = json_decode(file_get_contents('php://input'), true);

$carte = $donnees;

    try {
        $stmt = $pdo->prepare(" UPDATE cards SET is_favori = 1 WHERE iduser = :iduser AND idpokemon = :idpoke "); 
    // les variable avec les : sont comme les paramètres d'une fonction

        $stmt->execute([
        "iduser" =>$_SESSION["iduser"],
        "idpoke" => $carte['id'],
     
        ]);

    echo json_encode(['status' => 'ok', 'message' => 'Cartes enregistrées']);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


