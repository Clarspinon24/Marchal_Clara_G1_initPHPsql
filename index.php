<?php require_once("haut.php"); ?>

<body>
     <div class="content">
     <a  id="button"><img class="pochette" src="image/pochette.png" alt=""></a>
           
            <div class="booster">
                <img id="pokemon1" src="" alt=""/>
                <p id= "info1"></p>
            </div>

            <div class="booster">
                <img id="pokemon2" src="" alt=""/>
                <p id= "info2"></p>
            </div>

            <div class="booster">
                <img id="pokemon3" src="" alt=""/>
                <p id= "info3"></p>
            </div>
                  
            
          
          
</div>
</body>
<footer>
  <p>07 69 92 82 21</p>
  <p>Marchal Clara </p>
  <p>About Legal Contact</p>
  


  <script>    
    let sombre = document.querySelector("#sombre")
    sombre.addEventListener("click", function() {
    document.body.classList.toggle('black');
    })
    </script>
    
    <script src="js/sidenav.js"> </script>
     <script src="js/boosters.js"> </script>
</footer>
</html>