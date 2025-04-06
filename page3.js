let form= document.querySelector('.input');
   
form.addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire
    errorContainer.innerHTML = '';
    

    let réponse = document.getElementById('réponse');

    if (réponse.value === '') { 
        console.log('Mail invalide : champ vide.');
        réponse.classList.remove('invalide');
        réponse.classList.add('success');
    } else {
        réponse.classList.add('invalide');
        réponse.classList.remove('success');
    }
});

