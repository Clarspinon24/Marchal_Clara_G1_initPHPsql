let button_favoris = document.getElementById("button_favoris");

function envoyer_data(){

const idpoke = localStorage.getItem("Idpoke");

const idpokemon = [{ id: idpoke }];

fetch('php/favoris.php', {
    method: 'POST',
    headers: {
'Content-Type': 'application/json',
},
body: JSON.stringify(idpokemon)
})
.then(response => response.json())
.then(data => {
    console.log('✅ Réponse serveur :', data);
})
.catch(error => {
console.error('❌ Erreur envoi BDD :', error);
});

}

button_favoris.addEventListener("click",envoyer_data);
