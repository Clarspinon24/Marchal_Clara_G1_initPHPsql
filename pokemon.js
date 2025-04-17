let button = document.getElementById("button");
const images = [] ;
const container = document.getElementById('container');
const containerCarte = document.querySelector('.container-carte');

async function fetchPokemon(){ // fonction fléchée
    
    
    for (let i = 1; i< 201;i++){
        try{
            let request = `https://pokeapi.co/api/v2/pokemon/${i}`;

            let data= await fetch(request);
            console.log(data);

            let response = await data.json();
            console.log(response);

           images.push({ src: response.sprites.front_default , text: response.name })
        
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
                </div>
                <div class="carte carte-dos">
                    <p>${image.text}</p>
                </div>
        `;

      
        container.appendChild(carte);
        

    });

}

fetchPokemon();


