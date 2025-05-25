let button = document.getElementById("button");
const images = [] ;
const container = document.getElementById('container');
const containerCarte = document.querySelector('.container-carte');
const searchBar = document.querySelector(".search");
let idpoke = 0;

async function fetchPokemon(){ // fonction fléchée
    
    
    for (let i = 1; i< 201;i++){
        try{
            let request = `https://pokeapi.co/api/v2/pokemon/${i}`;

            let data= await fetch(request);
            console.log(data);

            let response = await data.json();
            console.log(response);

           images.push({ src: response.sprites.front_default , text: response.name, id :response.id })
        
        } catch(error){
            console.error(error)
        }
    }
   console.log(images);

    images.forEach(image => {
        const carte = document.createElement('div');
        carte.className = 'container-carte';

        carte.innerHTML = `
          
                <div class="carte carte-devant">
                    <img  src="${image.src}" alt="Carte">
                    <p>${image.text} #${image.id}
                    </p>
                </div>
        `;

       carte.addEventListener('click', () => {
            
           idpoke = image.id;
           console.log(idpoke);
           dataPokemon(idpoke);
           
        });
      
        container.appendChild(carte);

        

    });

}

fetchPokemon();



       


searchBar.addEventListener("keyup", (e) => {
    const searched = e.target.value.trim();

    if (searched.length > 0) {
        searchAndDisplayPokemon(searched);
    } else {
        container.innerHTML = "";
        fetchPokemon(); // Recharge les 20 premiers si la recherche est vide
    }
});


fetchPokemon();

const dataPokemon = async() => { 

let request = `https://pokeapi.co/api/v2/pokemon/${idpoke}`;

let data= await fetch(request);

let response = await data.json();
console.log(response);

localStorage.setItem("Idpoke", idpoke);
window.open("details.html");
   
}

