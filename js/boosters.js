let button = document.getElementById("button");

let pokemon1 = document.getElementById("pokemon1");
let pokemon2 = document.getElementById("pokemon2");
let pokemon3 = document.getElementById("pokemon3");
let pokemon4 = document.getElementById("pokemon4");
let pokemon5 = document.getElementById("pokemon5");

let booster1 = document.getElementById("booster1");
let booster2 = document.getElementById("booster2");
let booster3 = document.getElementById("booster3");
let booster4 = document.getElementById("booster4");
let booster5= document.getElementById("booster5");

let info1 = document.getElementById("info1");
let info2 = document.getElementById("info2");
let info3 = document.getElementById("info3");
let info4 = document.getElementById("info4");
let info5 = document.getElementById("info5");

const pokemons= [] ;


async function booster(){ 

        try{
         
        for (let i = 0; i < 5; i++) {
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

        pokemon4.src = pokemons[3].src;
        pokemon4.alt = pokemons[3].text;
        info4.textContent=pokemons[3].text;

        pokemon5.src = pokemons[4].src;
        pokemon5.alt = pokemons[4].text;
        info5.textContent=pokemons[4].text;

        button.style.display="none";
        booster1.classList.add('carte');
        booster2.classList.add('carte');
        booster3.classList.add('carte');
        booster4.classList.add('carte');
        booster5.classList.add('carte');

       

        } catch(error){
            console.error(error);
        }
    }


button.addEventListener("click",booster);

