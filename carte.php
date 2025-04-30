
<?php
require_once("connexion.php");

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


   <button type=""><a href="index.php">Accueil</a></button> 

     
</ul> 
</nav>  

<!--Formulaire pour rajouter des cartes-->

        
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

        
        <input id="" name="" type="hidden" value="">

        <input type="submit" value="Créer  une carte">

        </form>
            <?php
                
            foreach ($cartes as $key => $cards) {//Pour tout les cartes à l'intérieur de la table cards
                echo "<div class='carte'>"; // crée une div pour faire une carte
                echo "<p> N°" .  $cards["idpokemon"]. "</p>";// met les informations récoltés dans la div
                echo "<p> Nom :" . $cards["namepoke"]. "</p>";
                echo "<img src=" .  $cards["sprite"] . ">";
                echo "<p> Types:" . $cards["types"]. "</p>";
                echo "<p> Poids :" . $cards["poids"] . "</p>";
                echo "<p>Stade Evolution :" . $cards["stade_evol"]. "</p>";
                echo "<p> Tailles:" . $cards["taille"]. "</p>";
                
                echo "<a href='?idpokemon=". $cards["idpokemon"] ."&action=delete'> Supprimer </a> ";
                // ? indique un paramètre, idpokemon prend la valeur de celui dans cards et le deuxième paramètre est action qui prend delete
                echo "<br>";
                echo "<a href='modifier.php?idpokemon=" . $cards['idpokemon'] . "'>Modifier</a>";
                
                echo "</div>";

            }
            

            ?>

            <style>
            .carte{
                margin:10px;
                padding:25px;
                border: 1px solid ;
                border-radius:10px;
                width: 200px;
                justify-content:center;
            }
            img{
               width: 100px;
            }
            </style>