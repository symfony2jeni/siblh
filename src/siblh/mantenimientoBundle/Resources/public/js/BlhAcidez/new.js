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
    
    //spinner
    $( "#spinner" ).spinner({
      spin: function( event, ui ) {
        if ( ui.value > 10 ) {
          $( this ).spinner( "value", -10 );
          return false;
        } else if ( ui.value < -10 ) {
          $( this ).spinner( "value", 10 );
          return false;
        }
      }
    });
    

  
       
    //Boton   
    
    $('#boton')
      .button();
       $('#boton1')
      .button();
      
   

 
  

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    

  
 $('#siblh_mantenimientobundle_blhacidez_acidez1').
            attr('data-bvalidator', 'required,between[1:15]');

  $('#siblh_mantenimientobundle_blhacidez_acidez2').
            attr('data-bvalidator', 'required,between[1:15]');
    
 $('#siblh_mantenimientobundle_blhacidez_acidez3').
            attr('data-bvalidator', 'required,between[1:15]');
  
  
 
 $('#siblh_mantenimientobundle_blhacidez_factor').
            attr('data-bvalidator', 'required,between[0.9:1.1]');
  
 
                          


//Calculando campos                        

var $Acidez1; 
var $Acidez2; 
var $Acidez3; 
var $mediaAcidez;
var $factor;
var $resultado;

/*  $('#siblh_mantenimientobundle_blhacidez_acidez1').on('input', function() {
    
   $Acidez1 = this.value;
   
    
   
});

   $('#siblh_mantenimientobundle_blhacidez_acidez2').on('input', function() {
    
     $Acidez2 = parseInt(this.value);
    
   
});
   $('#siblh_mantenimientobundle_blhacidez_acidez3').on('input', function() {
    
   $Acidez3 = parseInt(this.value);


}); */

    
$('#siblh_mantenimientobundle_blhacidez_mediaAcidez').on ('click', function() {
    $Acidez1 = $('#siblh_mantenimientobundle_blhacidez_acidez1').val();
    $Acidez2 = $('#siblh_mantenimientobundle_blhacidez_acidez2').val();
    $Acidez3 = $('#siblh_mantenimientobundle_blhacidez_acidez3').val();
    
    if (($Acidez1 == '') || ($Acidez2 == '') || ($Acidez3 == '') || ($Acidez1 < 1) || ($Acidez1 > 15) || ($Acidez2 < 1) || ($Acidez2 > 15)  || ($Acidez3 < 1) || ($Acidez3 > 15) ) 
{ alert ('Digite valores validos para la acidez');
    return false;}
else {
   $mediaAcidez= (parseInt($Acidez1) + parseInt($Acidez2) + parseInt($Acidez3))/3;
//Redondeando el resultado a 2 decimales 
$mediaAcidez = Math.round( $mediaAcidez* 100) / 100;
 
 
this.value = $mediaAcidez;  
}
 ; } ); 

/*   $('#siblh_mantenimientobundle_blhacidez_factor').on('input', function() {
    
 $factor = this.value;

}); */

$('#siblh_mantenimientobundle_blhacidez_resultado').on ('click', function() {
 
 $factor = $('#siblh_mantenimientobundle_blhacidez_factor').val();
 $mediaAcidez = $('#siblh_mantenimientobundle_blhacidez_mediaAcidez').val();
 
 if (($factor == '') || ($mediaAcidez == '') || ($factor < 0.9) || ($factor > 1.1) ) 
{ alert ('Verifique que el valor del facotor y la media acidez sean correctas');
    return false;}
else {
$resultado = $mediaAcidez*$factor;
//Redondeando el resultado a 2 decimales 
$resultado = Math.round( $resultado* 100) / 100;
 
this.value = $resultado; }
} ); 




$('#boton').on ('click', function() {

$acidez=$('#siblh_mantenimientobundle_blhacidez_resultado').val();

if($acidez>8){
    alert('Frasco descartado, acidez dornic mayor a 8');
}

});
     
   $('#siblh_mantenimientobundle_blhacidez_mediaAcidez').
            attr('data-bvalidator', 'required');
    
   $('#siblh_mantenimientobundle_blhacidez_resultado').
            attr('data-bvalidator', 'required');

});

function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}


 
 
 