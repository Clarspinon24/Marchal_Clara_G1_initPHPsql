let button = document.getElementById("button");
let image = document.getElementById("image");



const changePokemon = async() => { // fonction fléchée
    let randomNumber = Math.ceil(Math.random()*150)+1; //[1,151]
    
    let request = `https://pokeapi.co/api/v2/pokemon/${randomNumber}`;

    let data= await fetch(request);
    console.log(data);

    let response = await data.json();
    console.log(response);


    image.src = response.sprites.front_default;


}



changePokemon();
button.addEventListener("click",changePokemon)

