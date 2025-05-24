let images = [] ;
const container = document.getElementById('container');
const containerCarte = document.querySelector('.container-carte');
const searchBar = document.querySelector(".search");


async function fetchPokemon(){ 
    
    
    for (let i = 1; i< 501;i++){
        try{
            let request = `https://pokeapi.co/api/v2/pokemon/${i}`;

            let data= await fetch(request);
           

            let response = await data.json();
            

           images.push({ src: response.sprites.front_default , text: response.name, id : response.id })
        
        } catch(error){
            console.error(error)
        }
    }
   console.log(images);

    images.forEach(image => {
        const carte = document.createElement('div');
        const pokeNumber = document.createElement('div');
        carte.className = 'container-carte';

        carte.innerHTML = `
          
                <div class="carte carte-devant">
                    <img  src="${image.src}" alt="Carte">
                </div>
                <div class="carte carte-dos">
                    <p>${image.text}</p>
                </div>
              
        `;
       

        carte.addEventListener('click', () => {
            carte.classList.toggle('rotated');
        });
      
        container.appendChild(carte);
      
        

    });
}