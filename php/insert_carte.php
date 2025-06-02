<?php
require_once("connexion.php");
header('Content-Type: application/json');

$donnees = json_decode(file_get_contents('php://input'), true);//pourquoi true ?

    try {
        $stmt = $pdo->prepare("INSERT IGNORE INTO cards (idpokemon,namepoke,sprite,types,poids, taille) 
    VALUES(:idpokemon,:namepoke,:sprite,:types,:poids, :taille) "); 
    // les variable avec les : sont comme les paramètres d'une fonction

    foreach ($donnees as $carte) {
        $stmt->execute([
        "idpokemon" => $carte['id'],
        "namepoke" => $carte['text'],
        "sprite" => $carte['src'],
        "types" => $carte['type1'],
        "taille" => $carte['taille'],
        "poids" => $carte['poids']

        ]);
    }
    echo json_encode(['status' => 'ok', 'message' => 'Cartes enregistrées']);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }



