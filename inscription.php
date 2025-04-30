
<?php
require_once("haut.php");// haut de la page html 
require_once("connexion.php");// connexion à la base de donnée

if ($_POST) { // si la connexion marche
    $mail = $_POST["mail"];// permet de récupérer le mail avec la méthode post
    $password = $_POST["password"];//pareil
 


    try {// try catch permet d'executer le code malgré les erreurs et de les afficher directement sur la page
    $stmt = $pdo->prepare("INSERT INTO user (mail, password)  
    VALUES(:mail, :password)"); // stmt : 

    $stmt->execute([
        'mail' => $mail,//remplace le mail du insert par la variable mail récupérer au dessus avec le post
        'password' => password_hash($password, PASSWORD_DEFAULT),
       // hash modifie le mot de passe de manière aléatoire
        ]);

        header("location:compte.php");// Renvoie vers la page compte.php car l'inscription est fini
   

    } catch (PDOException $e) { // récupère les erreurs de pdo 
        echo $e->getMessage(); // les affiche
    }
}

?>


     <br><br><br><br><br><br>

 
<form id="form" method="POST" action="">
<!-- action="" permet de transmettre les données du fichier à l'exterieur et post est seulement la méthode utilisé -->
<h4>INSCRIPTION</h4>


<label for="mail">Email</label>
<input type="email" id="mail" name="mail" placeholder="Entrez votre email" required  />

<label for="password">Mot de passe</label>
<input type="password" id="password" name="password"  />


<button type="submit" id="submit">Envoyer</button>  


</form>