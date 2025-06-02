   
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

$stmt = $pdo->prepare("SELECT cards.* FROM cards INNER JOIN favoris ON cards.idpokemon = favoris.idpoke ");
$stmt->execute();
$favoris = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<body>
  <div class="espace"></div>

    <?php

    echo "<p> Vous êtes connecté avec l'adresse email " . $_SESSION["mail"]."</p>"; 

  
    // affiche que on est connecté en donnant l'adresse mail de connexion
echo "<h2>Favoris</h2>";
echo "<div class='container-carte'>";
foreach ($favoris as $fav) {
    echo "<div class='carte carte-devant'>";
    echo "<img id='imag' src='" . htmlspecialchars($fav["sprite"]) . "'>";
    echo "<p>" . htmlspecialchars($fav["namepoke"]) . ' #' . htmlspecialchars($fav["idpokemon"]) . "</p>";
    echo "</div>";
}
echo "</div>"; 

echo "<h2>Mes cartes</h2>";
echo "<div class='container-carte'>";
foreach ($cartes as $cards) {
    echo "<div class='carte carte-devant'>";
    echo "<img id='imag' src='" . htmlspecialchars($cards["sprite"]) . "'>";
    echo "<p>" . htmlspecialchars($cards["namepoke"]) . ' #' . htmlspecialchars($cards["idpokemon"]) . "</p>";
    echo "</div>";
}
echo "</div>"; 
        ?>
            

    <a href="?action=deconnexion">Se déconnecter</a><!--lien pour se deconnecter-->
          
</body>
<?php require_once("bas.php"); ?>
</html>
    




