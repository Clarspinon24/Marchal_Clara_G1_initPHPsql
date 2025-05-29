<?php
require_once("haut.php");
require_once("php/connexion.php");

///// LOGIN.PHP

if(isset($_SESSION["iduser"])) {
    header("location:compte.php");
} // ici c'est l'oposé de compte.php c'est à dire si la session à un iduser on se dirige automatiquement vers la page compte

if ($_POST) {

    $mail = trim($_POST["mail"]); // trim permet d'enlever les espaces
    $password = trim($_POST["password"]);

    if ($mail && $password) { // si on a le mail et le mot de passe

        
        $stmt = $pdo->query("SELECT * FROM user WHERE mail = '$mail' "); 
        //on récupère tout les données de l'utilisateur relié à cet email
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) { // on compare les mots de passes
            $_SESSION["iduser"] = $user["iduser"]; // on  rajoute à la session l'iduser
            $_SESSION["mail"] = $user["mail"]; // et le mail
            header("location:compte.php");
        } else {
            echo "La connexion a échoué !";
        }

  
    }

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

<br><br><br><br><br><br>

    

    <?php if (!isset($_SESSION["iduser"])) { ?> <!-- Dans le cas, où on a pas de iduser on remplit le formulaire de connexion -->
        <form method="POST">
        <h4>Connexion</h4>
            <label for="mail">Email:</label>
            <input type="text" name="mail" id="mail" placeholder="Email">


            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe">

            <input type="submit" value="Connexion">

        </form>

        <a href="inscription.php">Créer un compte</a> <!--ou on se créer un compte avec la page inscription -->

    <?php } ?>

</body>
<?php require_once("bas.php"); ?>
</html>



