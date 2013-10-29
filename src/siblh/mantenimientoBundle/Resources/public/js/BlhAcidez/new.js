$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
   
    //Tooltip                      
 
    $( document ).tooltip();
  
       
    //Boton   
    
    $('#boton')
      .button();
     

  

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    

  
 $('#siblh_mantenimientobundle_blhacidez_acidez1').
            attr('data-bvalidator', 'min[1],required');

  $('#siblh_mantenimientobundle_blhacidez_acidez2').
            attr('data-bvalidator', 'min[1],required');
    
 $('#siblh_mantenimientobundle_blhacidez_acidez3').
            attr('data-bvalidator', 'min[1],required');
    
 $('#siblh_mantenimientobundle_blhacidez_factor').
            attr('data-bvalidator', 'min[1],required');
  
 
                          


//Calculando campos                        

var $Acidez1; 
var $Acidez2; 
var $Acidez3; 
var $mediaAcidez;

  $('#siblh_mantenimientobundle_blhacidez_acidez1').on('input', function() {
    
   $Acidez1 = parseInt(this.value);
   
    
   
});

   $('#siblh_mantenimientobundle_blhacidez_acidez2').on('input', function() {
    
     $Acidez2 = parseInt(this.value);
    
   
});
   $('#siblh_mantenimientobundle_blhacidez_acidez3').on('input', function() {
    
   $Acidez3 = parseInt(this.value);
 $mediaAcidez= ($Acidez1 + $Acidez2 + $Acidez3)/3;

});

    
$('#siblh_mantenimientobundle_blhacidez_mediaAcidez').on ('click', function() {
 
//Redondeando el resultado a 2 decimales 
$mediaAcidez = Math.round( $mediaAcidez* 100) / 100;
 
 
this.value = $mediaAcidez; } ); 


});



      