<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Carte</title>
        <link rel="stylesheet" type="text/css" href="style.css">  
        

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
    <button id="sombre"> sombre </button>       
    <li><a class="genre" href=compte.php><img src="image/profil.png" class="icon1"></a></li>
     
</ul> 
</nav>  

<br><br><br><br><br><br><br><br>
    <main>
         

        <div class="search-barre">
            <img  class="loupe" src="image/search_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png">
            <input class="search" type="search" placeholder="search">
       
         </div>
        

    <div id ="container"></div>

                   
<script src="pokemon.js?v=3"></script>

          
            
    </div>
   </main>
   <footer>
    <p>07 69 92 82 21</p>
    <p>Marchal Clara </p>
    <p>About Legal Contact</p>
    <script>    
        
       
        let sombre = document.querySelector("#sombre");

        sombre.addEventListener("click", function() {
        document.body.classList.toggle('black');
        }) 
        
       
        </script>

       
  </footer>
</body>
</html>