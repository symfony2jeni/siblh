$(window).load(function() {
 // executes when complete page is fully loaded, including all frames, objects and images
 $("[id*=vldespachar_]:input").each(function() {
         var elemento= this;
         elemento.disabled = 'disabled';
        
        });
});
$(document).ready(function() { 
   
    
   
    
  $(":checkbox").click(function(e) {
          var aux= new Array();
          aux = (e.target.id).split("_");
          if ($(this).is(':checked')){
              document.getElementById("vldespachar_"+aux[1]).disabled = false;
              document.getElementById("vldespachar_"+aux[1]).focus();
             }
          else
              {
                document.getElementById("vldespachar_"+aux[1]).disabled = true;
                document.getElementById("vldespachar_"+aux[1]).value="";
                         
             
              }
        }); 
        
         
             
        
   $("[id*=vldespachar_]:input").blur(function(e) {
          // alert($("#_passHide").val());
         var aux= new Array();
          aux = (e.target.id).split("_");
         var isSelected = document.getElementById("idsdespachar_"+aux[1]).checked;
         if (document.getElementById("idsdespachar_"+aux[1]).checked === true && $(this).val() ==="")
             {
                 $(this).focus();
             }
        });
        
       



 
 //url = Routing.generate('blhfrascoprocesado_create');
//GRID para listado de frascos a combinar//
  

          
         
 }); 
    




