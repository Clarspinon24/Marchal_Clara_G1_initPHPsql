   
<?php

///// PROFILE.PHP
require_once("haut.php");
require_once("php/connexion.php");


if(!isset($_SESSION["iduser"])) { 
    // isset permet de savoir si il y a quelque chose à l'intérieur,ici on dis que 
    // si la session n'a pas de iduser on doit aller au login.
    header("location:login.php");
}


if(isset($_GET["action"]) && $_GET["action"] == "deconnexion") {// si on click sur deconnexion
    
    unset($_SESSION["iduser"]);// on enlève iduser de la session
    unset($_SESSION["mail"]); // de même pour le mail
    header("location:login.php"); // on ouvre la page login pour pouvoir se reconnecter
}


$stmt = $pdo->query("SELECT * FROM cards"); 
$cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="espace"></div>

    <?php

    echo "<p> Vous êtes connecté avec l'adresse email " . $_SESSION["mail"]."</p>"; 

  
    // affiche que on est connecté en donnant l'adresse mail de connexion
                
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
            

    <a href="?action=deconnexion">Se déconnecter</a><!--lien pour se deconnecter-->
          
</body>
<?php require_once("bas.php"); ?>
</html>
    




