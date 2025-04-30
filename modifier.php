<?php
require_once('connexion.php'); 

if (!isset($_GET['idpokemon'])) {
    echo "Aucun ID fourni.";
    exit;
}

$idpokemon = (int) $_GET['idpokemon'];

// On récupère les données existantes
$stmt = $pdo->prepare("SELECT * FROM cards WHERE idpokemon = :id");
$stmt->execute(['id' => $idpokemon]);
$card = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$card) {
    echo "Carte introuvable.";
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE cards SET namepoke = :namepoke, sprite = :sprite, types = :types, stade_evol = :stade_evol, poids = :poids, taille = :taille WHERE idpokemon = :idpokemon");
    $stmt->execute([
        'namepoke' => $_POST['namepoke'],
        'sprite' => $_POST['sprite'],
        'types' => $_POST['types'],
        'stade_evol' => $_POST['stade_evol'],
        'poids' => $_POST['poids'],
        'taille' => $_POST['taille'],
        'idpokemon' => $idpokemon
    ]);
    echo "Carte modifiée avec succès. <a href='carte.php'>Retour</a>";
    exit;
}
?>

<h1>Modifier une carte</h1>
<form method="POST">
    <label for="namepoke">Nom:</label>
    <input type="text" name="namepoke" value="<?= ($card['namepoke']) ?>">


    <label for="sprite">Sprite:</label>
    <input type="text" name="sprite" value="<?= ($card['sprite']) ?>">

    <label for="types">Types:</label>
    <input type="text" name="types" value="<?=($card['types']) ?>">

    <label for="stade_evol">Stade:</label>
    <input type="text" name="stade_evol" value="<?= ($card['stade_evol']) ?>">

    <label for="poids">Poids:</label>
    <input type="number" name="poids" value="<?= ($card['poids']) ?>">

    <label for="taille">Taille:</label>
    <input type="number" name="taille" value="<?=$card['taille']?>">

    <input type="submit" value="Mettre à jour">
</form>
