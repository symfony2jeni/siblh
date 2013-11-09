$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
   
    //Tooltip                      
      
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });  
  
       
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
var $factor;
var $resultado;

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

   $('#siblh_mantenimientobundle_blhacidez_factor').on('input', function() {
    
 $factor = this.value;

});

$('#siblh_mantenimientobundle_blhacidez_resultado').on ('click', function() {
 

$resultado = $mediaAcidez*$factor;
//Redondeando el resultado a 2 decimales 
$resultado = Math.round( $resultado* 100) / 100;
 
this.value = $resultado; } ); 

});



      
