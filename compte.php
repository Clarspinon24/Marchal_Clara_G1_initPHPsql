   
<?php
require_once("haut.php");
///// PROFILE.PHP
require_once("connexion.php");


if(!isset($_SESSION["iduser"])) {
    header("location:login.php");
}



if(isset($_GET["action"]) && $_GET["action"] == "deconnexion") {
    // je vide ma session
    unset($_SESSION["iduser"]);
    unset($_SESSION["mail"]);
    header("location:login.php"); // redirection sans paramètre
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
    <br><br><br><br><br><br><br><br><br><br>

    <?php

        echo "Vous êtes connecté avec l'adresse email " . $_SESSION["mail"];
    
    ?>
    
    <a href="?action=deconnexion">Se déconnecter</a>
    



</body>
</html>
    
</body>

 </html> 


</main>
   <footer>
    <p>07 69 92 82 21</p>
    <p>Marchal Clara </p>
    <p>About Legal Contact</p>

    <script>

document.querySelectorAll('li').forEach(element =>{
    element.addEventListener('click',function(){

        document.querySelectorAll('li').forEach(item=>{
         item.classList.remove('tab-active');
        })  
        this.classList.add('tab-active');

        document.querySelectorAll('div').forEach(item =>{
        item.classList.add('hide');
         })  

        if (this.classList.contains('tab-form')) {
            document.getElementById('formulaire').classList.remove('hide');
        }
        if (this.classList.contains('tab-text')) {
            document.getElementById('text').classList.remove('hide');
        }
        if (this.classList.contains('tab-img')) {
            document.getElementById('image').classList.remove('hide');
        }

        
    })
})
    //Button 
    
    let sombre = document.querySelector("#sombre")
    sombre.addEventListener("click", function() {
    document.body.classList.toggle('black');
    })</script>


  </footer>
</body>
</html>
