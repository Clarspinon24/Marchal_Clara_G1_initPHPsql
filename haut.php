<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Carte</title>
        <link rel="stylesheet" type="text/css" href="style.css">  
        <link rel="stylesheet" type="text/css" href="sombre.css"> 
        <link rel="stylesheet" type="text/css" href="stylemarketing.css">
        <link rel="stylesheet" type="text/css" href="pokemon.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="recherche.css">
        <link rel="stylesheet" type="text/css" href="menuderoulant.css">
        <link rel="stylesheet" type="text/css" href="carte.css">
        <link rel="stylesheet" type="text/css" href="tableau.css">
        <link rel="stylesheet" type="text/css" href="formulaire.css">
        

        <style>
            nav ul li{
            display: flex;
            justify-items: center;
            float: left;
            width: 15%;
            position: relative;
        }
            nav a{
                margin: 2px;
            }
            .icon1{
                margin:-11px
            }
            #sombre{
                margin: 30px;
            }
            nav{
                z-index: 3;
            }
            ::placeholder {
                color: rgba(0, 0, 0, 0.47);
                font-size: 0.9em;
}
        
        </style>
</head>

<nav>
<ul>
    <li><img class="icon" alt="icon" src="image/mew.png"></li>
    
    <li><a href="index.php">Accueil</a></li>
	<li><a href="collection.php">Collection</a> </li>   
    <li><a href="carte.php">Mes Cartes</a> </li>   
    <button id="sombre"> sombre </button>       
    <li><a class="genre" href=compte.php><img src="image/profil.png" class="icon1"></a></li>
     
</ul> 
</nav>  
