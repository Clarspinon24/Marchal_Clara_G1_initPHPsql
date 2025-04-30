let images = [] ;
const container = document.getElementById('container');
const containerCarte = document.querySelector('.container-carte');
const searchBar = document.querySelector(".search");
let idpoke = 0;


async function fetchPokemon(){ 
    
    
    for (let i = 1; i< 21;i++){
        try{

            let request =` https://pokeapi.co/api/v2/pokemon/${i}`;

            let data = await fetch(request);
           

            let response = await data.json();

            images.push({ src: response.sprites.front_default , text: response.name, id : response.id })

           // createPokemonCard(image); // fonction pour créer et afficher une carte
        
        } catch(error){
            console.error(error)
        }
    }


   console.log(images);


   async function searchAndDisplayPokemon(name) {
    try {
        const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${name.toLowerCase()}`);
        if (!response.ok) throw new Error("Pokémon non trouvé");

        const data = await response.json();

        if (!data.sprites || !data.sprites.front_default) {
            throw new Error("Image introuvable");
        }

        const carte = document.createElement('div');
        carte.className = 'container-carte';
        carte.innerHTML = `
            <div class="carte carte-devant">
                <img src="${data.sprites.front_default}" alt="${data.name}">
                <p id="text-carte">${data.name}</p>
            </div>
        `;
      } catch (error) {
        container.innerHTML = `<p style="color:red">Aucun Pokémon trouvé pour "${name}"</p>`;
        console.error(error.message);
    }
}
   function createPokemonCard(image) {

        const carte = document.createElement('div');
        carte.className = 'container-carte';

        carte.innerHTML = `
          
                <div class="carte carte-devant">
                    <img  src="${image.src}" alt="Carte"> 
                     <p id ="text-carte">${image.text}</p>
                </div>
        `;
       

        carte.addEventListener('click', () => {
            
           idpoke = image.id;
           console.log(idpoke);
           dataPokemon(idpoke);
           
        });
      
        container.appendChild(carte);
}



searchBar.addEventListener("keyup", (e) => {
    const searched = e.target.value.trim();

    if (searched.length > 0) {
        searchAndDisplayPokemon(searched);
    } else {
        container.innerHTML = "";
        fetchPokemon(); // Recharge les 20 premiers si la recherche est vide
    }
});

}

fetchPokemon();

const dataPokemon = async() => { 

let request = `https://pokeapi.co/api/v2/pokemon/${idpoke}`;

let data= await fetch(request);

let response = await data.json();
console.log(response);

localStorage.setItem("Idpoke", idpoke);
window.open("details.html");
   
}

