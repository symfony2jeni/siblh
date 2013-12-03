$(window).load(function() {
 // executes when complete page is fully loaded, including all frames, objects and images
 $("[id*=vlcombinar_]:input").each(function() {
         var elemento= this;
         elemento.disabled = 'disabled';
        
        });
});
$(document).ready(function() { 
   
    
      $.noConflict();
    
  $(":checkbox").click(function(e) {
          var aux= new Array();
          aux = (e.target.id).split("_");
          if ($(this).is(':checked')){
              document.getElementById("vlcombinar_"+aux[1]).disabled = false;
              document.getElementById("vlcombinar_"+aux[1]).focus();
             }
          else
              {
                document.getElementById("vlcombinar_"+aux[1]).disabled = true;
                document.getElementById("vlcombinar_"+aux[1]).value="";
                         
             
              }
        }); 
        
         
             
        
   $("[id*=vlcombinar_]:input").blur(function(e) {
          // alert($("#_passHide").val());
         var aux= new Array();
          aux = (e.target.id).split("_");
         var isSelected = document.getElementById("idscombinar_"+aux[1]).checked;
         if (document.getElementById("idscombinar_"+aux[1]).checked === true && $(this).val() ==="")
             {
                 $(this).focus();
             }
        });
        
       

    //Boton   
    
    $('#lote')
      .button();
       $('#boton1')
      .button();

 
 //url = Routing.generate('blhfrascoprocesado_create');
//GRID para listado de frascos a combinar//
  

          
         
 }); 
    

