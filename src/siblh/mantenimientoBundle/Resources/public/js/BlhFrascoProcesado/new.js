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
              document.getElementById("vldisponible_"+aux[1]).disabled = false;
              document.getElementById("vldisponible_"+aux[1]).readOnly = true;
              document.getElementById("vlcombinar_"+aux[1]).focus();
             }
          else
              {
                document.getElementById("vlcombinar_"+aux[1]).disabled = true;
                document.getElementById("vldisponible_"+aux[1]).readOnly = false;
                document.getElementById("vldisponible_"+aux[1]).disabled = true;
                document.getElementById("vlcombinar_"+aux[1]).value="0";
                         
             
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
        
   
   
   $("[id*=vlcombinar_]:input").keyup(function() {
      
       var identificador = $(this).attr("id");
        corr = (identificador).split("_");
        
        ////////////////////
        document.getElementById("suma_aux").value = "0";
        $("[id*=vlcombinar_]:input").each(function() {
        
        
        var aux = parseFloat(document.getElementById("suma_aux").value);
        aux = aux + parseFloat($(this).val());
        document.getElementById("suma_aux").value = aux;
        
       
        
        });
            if (parseInt(document.getElementById("suma_aux").value)> parseInt(document.getElementById("vol_pasteurizacion").value))
        {
            alert("La suma de los volumenes a combinar excede el volumen de la pasteurizacion");
            $(this).val("0");
            $(this).focus();
                $(this).select();
        }
        ////////////////////
        
        
        var aux = document.getElementById("vldisponible_"+corr[1]).value;
        if (parseFloat(aux) < parseFloat($(this).val()))
            {
                alert("No puede ser mayor al volumen disponible");
                $(this).val("0");
                $(this).focus();
                $(this).select();
                
            }
            
         
        });
   
   

    //Boton   
    
    $('#lote').click(function(e) {
          document.getElementById("suma_aux").value = "0";
        $("[id*=vlcombinar_]:input").each(function() {
        
        
        var aux = parseFloat(document.getElementById("suma_aux").value);
        aux = aux + parseFloat($(this).val());
        document.getElementById("suma_aux").value = aux;
        
       
        
        });
            if (parseInt(document.getElementById("suma_aux").value)< parseInt(document.getElementById("vol_pasteurizacion").value))
        {
             event.preventDefault();
            alert("La suma de los volumenes a combinar no cumple con el volumen de la pasteurizacion");
           
            //$(this).val("0");
            //$(this).focus();
                //(this).select();
        }
        }); 
    
    
    $('#lote')
      .button();
       $('#boton1')
      .button();

 
 //url = Routing.generate('blhfrascoprocesado_create');
//GRID para listado de frascos a combinar//
  

          
         
 }); 
    
function isNumberKey(evt) { 
    var charCode = (evt.which) ? evt.which : event.keyCode 
    if (charCode > 31 && (charCode < 48 || charCode > 57)) { 
        //$.validationEngine.buildPrompt($("#telefono"),"El telefono Solo puede contener Numeros"); 
        return false; 
    } 
    return true; 
}

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}


