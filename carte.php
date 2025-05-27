
<?php
require_once("php/connexion.php");
require_once("haut.php");

if ($_POST) {

    $idpokemon = $_POST["idpokemon"]?? null;  
    // ??:vérifier si une variable existe et n’est pas nulle, la valeur qui suit et celle par default ici null
    //J'étais obligé car sinon il me disait que idpokemon n'était pas défini
    $namepoke = $_POST["namepoke"];
    $sprite = $_POST["sprite"];
    $types = $_POST["types"];
    $poids = $_POST["poids"];
    $stade_evol = $_POST["stade_evol"];
    $taille = $_POST["taille"] ;
   
    


    
    try {
        $stmt = $pdo->prepare("INSERT INTO cards (idpokemon,namepoke,sprite,types,poids, stade_evol, taille) 
    VALUES(:idpokemon,:namepoke,:sprite,:types,:poids, :stade_evol, :taille) "); 
    // les variable avec les : sont comme les paramètres d'une fonction


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





$stmt = $pdo->query("SELECT * FROM cards"); 
$cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
            <?php
                
            foreach ($cartes as $key => $cards) {//Pour tout les cartes à l'intérieur de la table cards
                echo "<div class=' container-carte'>"; // crée une div pour faire une carte
                echo"<div class='carte carte-devant'>";
                echo "<img id='imag' src=" .  $cards["sprite"] . ">";
                echo "<p>" . $cards["namepoke"].  $cards["idpokemon"]. "</p>";
              //  echo "<a href='?idpokemon=". $cards["idpokemon"] ."&action=delete'> Supprimer </a> ";
                // ? indique un paramètre, idpokemon prend la valeur de celui dans cards et le deuxième paramètre est action qui prend delete
              //  echo "<br>";
             //   echo "<a href='modifier.php?idpokemon=" . $cards['idpokemon'] . "'>Modifier</a>";
                 echo "</div>";
                echo "</div>";

            }  ?>
            

          

          

 </body>
    <?php require_once("bas.php"); ?>
       
    </html>

      