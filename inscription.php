
<?php
require_once("haut.php");
require_once("connexion.php");

if ($_POST) {
    $mail = $_POST["mail"];
    $password = $_POST["password"];
 


    try {
    $stmt = $pdo->prepare("INSERT INTO user (mail, password)
    VALUES(:mail, :password)");

    $stmt->execute([
        'mail' => $mail,
        'password' => password_hash($password, PASSWORD_DEFAULT),
       
        ]);

        header("location:compte.php");
   

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>


     <br><br><br><br><br><br>

 
<form id="form" method="POST" action="">

<h4>INSCRIPTION</h4>


<label for="mail">Email</label>
<input type="email" id="mail" name="mail" placeholder="Entrez votre email" required  autocomplete="email"/>

<label for="password">Mot de passe</label>
<input type="password" id="password" name="password"  autocomplete="new-password" />

<ul id="errorContainer" class="errorContainer"></ul> 
<ul id="successContainer" class="successContainer"></ul>

<button type="submit" id="submit">Envoyer</button>  


</form>