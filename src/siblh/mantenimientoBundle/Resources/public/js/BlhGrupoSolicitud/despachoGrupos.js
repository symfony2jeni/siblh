$(window).load(function() {
 // executes when complete page is fully loaded, including all frames, objects and images
 $("[id*=vldespachar_]:input").each(function() {
         var elemento= this;
         elemento.disabled = 'disabled';
        
        });
});


$(document).ready(function() { 
   $.noConflict();
        //boton       
 $('#boton').button(); 
 $('#lote').button();    
    
    
  $(":checkbox").click(function(e) {
          var aux= new Array();
          aux = (e.target.id).split("_");
          if ($(this).is(':checked')){
              document.getElementById("vldespachar_"+aux[1]).disabled = false;
              document.getElementById("vldisponible_"+aux[1]).disabled = false;
              document.getElementById("vldisponible_"+aux[1]).readOnly = true;
              
              document.getElementById("vldespachar_"+aux[1]).focus();
             }
          else
              {
                document.getElementById("vldespachar_"+aux[1]).disabled = true;
                
              document.getElementById("vldisponible_"+aux[1]).readOnly = false;
              document.getElementById("vldisponible_"+aux[1]).disabled = true;
                document.getElementById("vldespachar_"+aux[1]).value="0";
                         
             
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
        
        
          $("[id*=vldisponible_]:input").blur(function(e) {
          // alert($("#_passHide").val());
         var aux= new Array();
          aux = (e.target.id).split("_");
         var isSelected = document.getElementById("idsdespachar_"+aux[1]).checked;
         if (document.getElementById("idsdespachar_"+aux[1]).checked === true && $(this).val() ===("vldisponible_"+aux[1]).val())
             {
                 $(this).focus();
             }
        });
         


 
   $("[id*=vldespachar_]:input").keyup(function() {
      
       var identificador = $(this).attr("id");
        corr = (identificador).split("_");
        
        ////////////////////
        document.getElementById("suma_aux").value = "0";
        $("[id*=vldespachar_]:input").each(function() {
        
        
        var aux = parseFloat(document.getElementById("suma_aux").value);
        aux = aux + parseFloat($(this).val());
        document.getElementById("suma_aux").value = aux;
        
       
        
        });
            if (parseInt(document.getElementById("suma_aux").value)> parseInt(document.getElementById("vol_despachar").value))
        {
            alert("La suma de los volumenes a despachar excede el volumen total a despachar");
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
   
 $('#lote').click(function(e) {
          document.getElementById("suma_aux").value = "0";
        $("[id*=vldespachar_]:input").each(function() {
        
        
        var aux = parseFloat(document.getElementById("suma_aux").value);
        aux = aux + parseFloat($(this).val());
        document.getElementById("suma_aux").value = aux;
        
       
        
        });
            if (parseInt(document.getElementById("suma_aux").value)< parseInt(document.getElementById("vol_despachar").value))
        {
             event.preventDefault();
            alert("La suma de los volumenes a despachar no cumple con el volumen total a despachar a despachar");
           
            //$(this).val("0");
            //$(this).focus();
                //(this).select();
        }
        }); 
    

          
         
 }); 
    
function isNumberKey(evt) { 
    var charCode = (evt.which) ? evt.which : event.keyCode 
    if (charCode > 31 && (charCode < 48 || charCode > 57)) { 
        //$.validationEngine.buildPrompt($("#telefono"),"El telefono Solo puede contener Numeros"); 
        return false; 
    } 
    return true; 
}




