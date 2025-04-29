let images = [] ;
const container = document.getElementById('container');
const containerCarte = document.querySelector('.container-carte');
const searchBar = document.querySelector(".search");
let idpoke = 0;


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
                     <p id ="text-carte">${image.text}</p>
                </div>
                  
                
              
        `;
       

        carte.addEventListener('click', () => {
            
           idpoke = image.id;
           console.log(idpoke);
           dataPokemon(idpoke);
           
        });
      
        container.appendChild(carte);
      
        

    });

    




function filterElements (letters, container) {
if(letters.length >0){
    const cartes = container.querySelectorAll('.container-carte'); 
        cartes.forEach(element => {
            const pokemonName = element.querySelector('.carte-dos p').textContent.toLowerCase();// obliger car on ignore de quel pokemon on parle
        if(pokemonName.includes (letters)) {
             element.style.display="block";
        }else{
            element.style.display = "none";
        }
});
    }  else {
    const cartes = container.querySelectorAll('.container-carte');
    cartes.forEach(element => element.style.display = "block");
    
}

}

searchBar.addEventListener("keyup", (e) => {
    const searchedLetters = e.target.value;
    filterElements (searchedLetters, container);
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

