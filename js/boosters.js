let button = document.getElementById("button");
let pokemon1 = document.getElementById("pokemon1");
let pokemon2 = document.getElementById("pokemon2");
let pokemon3 = document.getElementById("pokemon3");
let info1 = document.getElementById("info1");
let info2 = document.getElementById("info2");
let info3 = document.getElementById("info3");
const pokemons= [] ;


async function booster(){ 

        try{
         
        for (let i = 0; i < 3; i++) {
        let randomNumber = Math.floor(Math.random() * 151) + 1; // floor : c'est un plus petit int mais le plus proche de la valeur
        let request = `https://pokeapi.co/api/v2/pokemon/${randomNumber}`;

        let data= await fetch(request);
        console.log(data);

        let response = await data.json();
        console.log(response);

        pokemons.push({ src: response.sprites.front_default , text: response.name, id :response.id }) 

       console.log(pokemons); 
    }

        pokemon1.src = pokemons[0].src;
        pokemon1.alt = pokemons[0].text;
        info1.textContent=pokemons[0].text;

        pokemon2.src = pokemons[1].src;
        pokemon2.alt = pokemons[1].text;
        info2.textContent=pokemons[1].text;

        pokemon3.src = pokemons[2].src;
        pokemon3.alt = pokemons[2].text;
        info3.textContent=pokemons[2].text;

        button.style.display="none";
        
        } catch(error){
            console.error(error);
        }
    }


button.addEventListener("click",booster);

