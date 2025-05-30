let images = [] ;
   
async function fetchPokemon() {

    for (let i = 1; i< 1026;i++){
        try{
            let request = `https://pokeapi.co/api/v2/pokemon/${i}`;

            let data= await fetch(request);
              console.log(data);
          

            let response = await data.json();
                
             images.push({ response})
        
        } catch(error){
            console.error(error)
        }
    }
    console.log(images);
}

fetchPokemon();
