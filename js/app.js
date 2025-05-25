let button = document.getElementById("button");
let pokemon1 = document.getElementById("pokemon1");
let pokemon2 = document.getElementById("pokemon2");
let pokemon3 = document.getElementById("pokemon3");


const changePokemon = async() => { // fonction fléchée
    let randomNumber = Math.ceil(Math.random()*150)+1; //[1,151]

    // plus de l'aléatoire mais de la selection 
    // récupère le numéro des cartes choisis
    
    let request = `https://pokeapi.co/api/v2/pokemon/${randomNumber}`;

    let data= await fetch(request);
    console.log(data);

    let response = await data.json();
    console.log(response);


    image.src = response.sprites.front_default;
    // et le reste des données

}


changePokemon();
button.addEventListener("click",changePokemon)

