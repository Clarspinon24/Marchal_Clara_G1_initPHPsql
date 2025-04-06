const searchInput = document.querySelector('.search-barre');
const cartes = document.querySelectorAll('.carte1');


cartes.forEach(carte => {
    carte.addEventListener('click', () => {
        const carteInterne = carte.querySelector('.carte-interne');
        const isFlipped = carteInterne.style.transform === 'rotateY(180deg)';
        carteInterne.style.transform = isFlipped ? 'rotateY(0deg)' : 'rotateY(180deg)';
    });
});

searchInput.addEventListener("input",e =>{
  const value = e.target.value;
  console.log(value)
});
