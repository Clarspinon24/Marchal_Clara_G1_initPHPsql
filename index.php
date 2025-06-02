<?php require_once("haut.php"); ?>

<body>
     <br><br><br><br><br><br>
    <button > <a id="ouvrir" href="indexmarketing.html">ouvre ton booster</a></button>
      
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

<div id="gen1" class="generation"></div>
<div id="gen2" class="generation hide"></div>
<div id="gen3" class="generation hide"></div>






</body>
<?php require_once("bas.php"); ?>