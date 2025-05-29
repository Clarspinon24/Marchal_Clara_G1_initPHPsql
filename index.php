<?php require_once("haut.php"); ?>

<body>
     
    

 <a  id="button"><img class="pochette" src="image/pochette.png" alt=""></a>

<section class="booster">
            <article id="booster1">
                <img id="pokemon1" src="" alt=""/>
                <p id= "info1"></p>
            </article> 
        
            <article id="booster2">
                <img id="pokemon2" src="" alt=""/>
                <p id= "info2"></p>
            </article>

           <article id="booster3">
                <img id="pokemon3" src="" alt=""/>
                <p id= "info3"></p>
            </article>

            <article id="booster4">
                <img id="pokemon4" src="" alt=""/>
                <p id= "info4"></p>
            </article>

            <article id="booster5">
                <img id="pokemon5" src="" alt=""/>
                <p id= "info5"></p>
            </article>
</section>
            <a id="ajouter" type="">Ajouter à ma collection</a> 
            

     
<ul>
    <li class=" tab tab-1 tab-active">génération 1</li>
    <li class=" tab tab-2">génération 2</li>
    <li class=" tab tab-3">génération 3</li>
</ul>

<dialog>
  <form>
    <h4>Echange</h4>

    <label >Adresse mail</label>
    <input placeholder="Entrez votre adresse mail." required  />

    <label >Pokémon à échanger</label>
    <input placeholder="Entrez le nom du pokémon à échanger." required  />

    <label for="password">Personne qui reçoit</label>
    <input placeholder="Entrez le nom de la personne qui reçoit." required  />
 </form>
  <button  id="close" autofocus>Close</button>
</dialog>
<button id="echang_button">Formulaire d'échange</button>


<div id="container"></div>

<div id="gen1"> </div>
<div id="gen2"> </div>
<div id="gen3"> </div>






</body>
<?php require_once("bas.php"); ?>