<?php
require_once("haut.php");
require_once("connexion.php");

///// LOGIN.PHP

if(isset($_SESSION["iduser"])) {
    header("location:compte.php");
}

if ($_POST) {

    $mail = trim($_POST["mail"]);
    $password = trim($_POST["password"]);

    if ($mail && $password) {

        
        $stmt = $pdo->query("SELECT * FROM user WHERE mail = '$mail' ");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["iduser"] = $user["iduser"];
            $_SESSION["mail"] = $user["mail"];
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

    

    <?php if (!isset($_SESSION["iduser"])) { ?>
        <form method="POST">
        <h4>Connexion</h4>
            <label for="mail">Email:</label>
            <input type="text" name="mail" id="mail" placeholder="Email">


            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe">

            <input type="submit" value="Connexion">

        </form>

        <a href="inscription.php">Créer un compte</a>

    <?php } ?>

</body>

</html>



