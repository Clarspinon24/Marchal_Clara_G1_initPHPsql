let images = [] ;

   
export async function fetchPokemon(min, max, containerId) {

   const container = document.getElementById(containerId);

    for (let i = min; i< max;i++){
        try{
        let request = `https://pokeapi.co/api/v2/pokemon/${i}`;

            let data= await fetch(request);
              console.log(data);
          

            let response = await data.json();
              console.log(data);
                
            images.push({
            id: response.id,
            src: response.sprites.front_default ?? 'fallback.png',
            text: response.name,
            taille: response.height,
            poids: response.weight,
            cris: response.cries,
            type1: response.types[0].type.name,
        
            });
                    
        } catch(error){
            console.error(error)
        }
    }



}


