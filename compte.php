   
<?php
require_once("haut.php");
///// PROFILE.PHP
require_once("connexion.php");


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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br> <!-- simplement pour ne pas être gêné par la nav du fichier php-->

    <?php

        echo "Vous êtes connecté avec l'adresse email " . $_SESSION["mail"]; 
        // affiche que on est connecté en donnant l'adresse mail de connexion
    
    ?>
    
    <a href="?action=deconnexion">Se déconnecter</a><!--lien pour se deconnecter-->
    



</body>
 <?php require_once("bas.php"); ?>
</html>
    




