<footer>
  <p>07 69 92 82 21</p>
  <p>Marchal Clara </p>
  <p>About Legal Contact</p>
  


  <script>    
    let sombre = document.querySelector("#sombre")
    sombre.addEventListener("click", function() {
    document.body.classList.toggle('black');
    })


    // Tabs en js
document.querySelectorAll('li').forEach(element =>{
    element.addEventListener('click',function(){

        document.querySelectorAll('li').forEach(item=>{
         item.classList.remove('tab-active');
        })  
        this.classList.add('tab-active');

        document.querySelectorAll('div').forEach(item =>{
        item.classList.add('hide');
         })  

        if (this.classList.contains('tab-form')) {
            document.getElementById('formulaire').classList.remove('hide');
        }
        if (this.classList.contains('tab-text')) {
            document.getElementById('text').classList.remove('hide');
        }
        if (this.classList.contains('tab-img')) {
            document.getElementById('image').classList.remove('hide');
        }

        
    })
})
    </script>
    
    <script src="js/sidenav.js"> </script>
     <script src="js/boosters.js"> </script>
</footer>
