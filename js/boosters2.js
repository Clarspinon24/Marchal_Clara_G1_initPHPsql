
let ajouter = document.getElementById("ajouter");
let button = document.getElementById("button");
let container_booster = document.getElementById("container_booster");
let idpoke=0;

let images = [] ;
 async function booster() {
  for (let i = 0; i < 5; i++) {
    let randomNumber = Math.floor(Math.random() * 151) + 1;

    try {
      let request = `https://pokeapi.co/api/v2/pokemon/${randomNumber}`;
      let data = await fetch(request);
      let response = await data.json();

      images.push({
        id: response.id,
        src: response.sprites.front_default ?? 'fallback.png',
        text: response.name,
        taille: response.height,
        poids: response.weight,
        cris: response.cries,
        type1: response.types[0].type.name,
      });

      button.style.display="none";

    } catch (error) {
      console.error(error);
    }
  }

  images.forEach(image => {
    const carte = document.createElement('div');
    carte.className = 'container-carte';

    carte.innerHTML = `
      <div class="carte carte-devant">
        <img src="${image.src}" alt="Carte">
        <p>${image.text} #${image.id}</p>
      </div>
    `;

    carte.addEventListener('click', () => {
      idpoke = image.id;
      console.log(idpoke);
      dataPokemon(idpoke);
    });

    container_booster.appendChild(carte);
  });

}


function envoyer_data(){

fetch('php/insert_carte.php', {
    method: 'POST',
    headers: {
'Content-Type': 'application/json',
},
body: JSON.stringify(images)
})
.then(response => response.json())
.then(data => {
    console.log('✅ Réponse serveur :', data);
    container_booster.innerHTML = ""; 
    images=[];
    window.open("index.php");
})
.catch(error => {
console.error('❌ Erreur envoi BDD :', error);
});

}


const dataPokemon = async() => { 

let request = `https://pokeapi.co/api/v2/pokemon/${idpoke}`;

let data= await fetch(request);

let response = await data.json();
console.log(response);

localStorage.setItem("Idpoke", idpoke);
window.open("details.html");
   
}

button.addEventListener("click", async () => {
  if (button.disabled) return;

  button.disabled = true; 
  await booster();
  setTimeout(() => {
    button.disabled = false; 
  }, 120000); 
});

ajouter.addEventListener("click", envoyer_data);   
   