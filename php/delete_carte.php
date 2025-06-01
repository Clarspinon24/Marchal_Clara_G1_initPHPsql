
<?php
require_once("php/connexion.php");


if(isset($_GET['action']) && $_GET['action'] == 'delete') {

    $idpokemon = $_GET['idpokemon'];// récupère l'idpokemon de l'url

    try {
        $stmt = $pdo->prepare("DELETE FROM cards WHERE idpokemon = :idpokemon");// supprime les données le concernant

        $stmt->execute([
            "idpokemon" => $idpokemon,//execute le requête avec le bon idpokemon
        ]);

        echo "La carte a bien été supprimé !";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}



