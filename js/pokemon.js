const images = [] ;
const containerCarte = document.querySelector('.container-carte');
const searchBar = document.querySelector(".search");
let idpoke = 0;


async function fetchPokemon(min, max, containerId) {

    const container = document.getElementById(containerId);
  
     console.log(min,max);

    container.innerHTML = '';
    images.length = 0;

    for (let i = min; i< max;i++){
        try{
            let request = `https://pokeapi.co/api/v2/pokemon/${i}`;

            let data= await fetch(request);
          

            let response = await data.json();
          

           images.push({ src: response.sprites.front_default , text: response.name, id :response.id })
        
        } catch(error){
            console.error(error)
        }
    }

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





// searchBar.addEventListener("keyup", (e) => {
//     const searched = e.target.value.trim();
//     console.log(searched)
//     if (searched.length > 0) {
//       filterElements (searchedLetters, container);
//     } else {
//         container.innerHTML = "Aucun pokemon trouvé";
//     }
// });

fetchPokemon(1,386,'container');

document.querySelectorAll('li').forEach(element =>{
    element.addEventListener('click',function(){

        document.querySelectorAll('li').forEach(item=>{
         item.classList.remove('tab-active');
        })  
        this.classList.add('tab-active');

        document.querySelectorAll('div').forEach(item =>{
        item.classList.add('hide');
         })  

        if (this.classList.contains('tab-1')) {
            document.getElementById('gen1').classList.remove('hide');
            console.log("Tab 1 cliqué !");
            fetchPokemon(1,151,'gen1');
           
        }
        if (this.classList.contains('tab-2')) {
            document.getElementById('gen2').classList.remove('hide');
            console.log("Tab 2 cliqué !");
            fetchPokemon(152,251,'gen2');
        }
        if (this.classList.contains('tab-3')) {
            document.getElementById('gen3').classList.remove('hide');
            console.log("Tab 3 cliqué !");
            fetchPokemon(252,386,'gen3');
        }

        
    })
})

const dataPokemon = async() => { 

let request = `https://pokeapi.co/api/v2/pokemon/${idpoke}`;

let data= await fetch(request);

let response = await data.json();
console.log(response);

localStorage.setItem("Idpoke", idpoke);
window.open("details.html");
   
}


