$(document).ready(function() { 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    

  
   


$('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').
      attr('data-bvalidator', 'between[1:30],required');
    
$('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').
      attr('data-bvalidator-msg', "Ingrese la temperatura de 1 a 30 grados");  
      
$(function() {
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
        
           });

  $('#button').button(); 
   $('#boton').button();   
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
