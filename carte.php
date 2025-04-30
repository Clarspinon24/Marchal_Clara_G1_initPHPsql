
<?php
require_once("connexion.php");

if ($_POST) {

    $idpokemon = $_POST["idpokemon"];
    $namepoke = $_POST["namepoke"];
    $sprite = $_POST["sprite"];
    $types = $_POST["types"];
    $poids = $_POST["poids"];
    $stade_evol = $_POST["stade_evol"];
    $taille = $_POST["taille"] ;
   
    
  // ??:vérifier si une variable existe et n’est pas nulle

    
    try {
        $stmt = $pdo->prepare("INSERT INTO cards (idpokemon,namepoke,sprite,types,poids, stade_evol, taille) 
    VALUES(:idpokemon,:namepoke,:sprite,:types,:poids, :stade_evol, :taille) ");

        $stmt->execute([
         "idpokemon" => $idpokemon,
         "namepoke" => $namepoke ,
         "sprite" =>  $sprite,
         "types" => $types,
         "poids" =>$poids,
         "stade_evol" => $stade_evol,
         "taille" => $taille
        ]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {

    $idpokemon = $_GET['idpokemon'];

    try {
        $stmt = $pdo->prepare("DELETE FROM cards WHERE idpokemon = :idpokemon");

        $stmt->execute([
            "idpokemon" => $idpokemon,
        ]);

        echo "La carte a bien été supprimé !";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if (isset($_GET['action'], $_GET['idpokemon']) && $_GET['action'] === 'modify') {
    // On récupère l'ID de la carte à modifier
    $idpokemon = (int) $_GET['idpokemon'];

    try {
        // 1) On récupère les données existantes en BDD
        $stmt = $pdo->prepare("SELECT * FROM cards WHERE idpokemon = :idpokemon");
        $stmt->execute(['idpokemon' => $idpokemon]);
        $cardToEdit = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cardToEdit) {
            throw new Exception("Carte introuvable pour l'ID $idpokemon.");
        }
        // À ce stade, $cardToEdit contient :
        // [
        //   'idpokemon'  => 3,
        //   'namepoke'   => 'Pikachu',
        //   'sprite'     => 'https://...png',
        //   'types'      => 'Électrik',
        //   'poids'      => 6,
        //   'stade_evol' => 'De base',
        //   'taille'     => 0.4
        // ]


    } catch (PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage();
        exit;
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}



$stmt = $pdo->query("SELECT * FROM cards"); // PDO STATEMENT
$cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
         <table border="1">
        <thead>
            <th>Nom</th>
            <th>Image</th>
            <th>Types</th>
            <th>Poids</th>
            <th>Stade Evolution</th>
            <th>Taille</th>
            <th>Supprimer</th>
            <th>Modifier</th>    
        </thead>

        <tbody>
        <form method="POST" action="">


        <label for="namepoke">Nom:</label>
        <input type="text" name="namepoke" id="namepoke" placeholder="Nom Pokemon">

        <label for="sprite">Image:</label>
        <input type="text" name="sprite" id="sprite" placeholder="Image">

        <label for="types">Types:</label>
        <input type="text" name="types" id="types" placeholder="Types">

        <label for="stade_evol">Stade Evolution:</label>
        <input type="text" name="stade_evol" id="stade_evol" placeholder="Stade Evolution">

        <label for="poids">Poids:</label>
        <input type="number" name="poids" id="poids" placeholder="Poids">

        <label for="taille">Taille:</label>
        <input type="number" name="taille" id="taille" placeholder="Tailles">
        
        <input type="hidden" name="idpokemon" value="<?= $cardToEdit['idpokemon'] ?>">
        <input name="namepoke" value="<?= htmlspecialchars($cardToEdit['namepoke']) ?>">

        <input id="" name="" type="hidden" value="">

        <input type="submit" value="Créer  une carte">

        </form>
            <?php

            foreach ($cartes as $key => $cards) {
                echo "<tr>";
                echo "<td>" .  $cards["idpokemon"]. "</td>";
                echo "<td>" . $cards["namepoke"]. "</td>";
                echo "<td>" .  $cards["sprite"] . "</td>";
                echo "<td>" . $cards["types"]. "</td>";
                echo "<td>" . $cards["poids"] . "</td>";
                echo "<td>" . $cards["stade_evol"]. "</td>";
                echo "<td>" . $cards["taille"]. "</td>";
                
                echo "<td> <a href='?idpokemon=". $cards["idpokemon"] ."&action=delete'> Supprimer </a> </td>";
                echo "<td> <a href='?idpokemon=". $cards["idpokemon"] . "&action=modify'> Modifier </a> </td>";
                
                echo "</tr>";

            }
            

            ?>

            </tbody>
         </table>
        </div>
     