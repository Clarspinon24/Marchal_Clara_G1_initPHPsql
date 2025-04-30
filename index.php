<?php require_once("haut.php"); ?>

<body>
    <br><br><br><br> <br> <br> <br><br>

            <div id="wrapper">
                <div id="image-wrapper">
                    <img id="image" src="" alt=""/>
                </div>
            </div>
            
            <div id="button">Obtient un nouveau pokemon !</div>
           
            <br>
            <br> <br> <br>
</body>
<footer>
  <p>07 69 92 82 21</p>
  <p>Marchal Clara </p>
  <p>About Legal Contact</p>
  
  <script src="app.js"></script>

  <script>    
    let sombre = document.querySelector("#sombre")
    sombre.addEventListener("click", function() {
    document.body.classList.toggle('black');
    })
    </script>
</footer>
</html>