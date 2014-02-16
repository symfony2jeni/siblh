$(document).ready(function() { 
    
  //Inicio de modificacion de rox  
        
  //Temperatura enfriamiento
    
       $('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').keyup(function() 
    {
             if (($(this).val()< 0 || $(this).val()> 5) && $(this).val()!=='')
        {   
            $('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').val(''); 
            alert('Digite un valor valido en Temperatura');
         }
            else
                {$(this).focus();}
     } );
     
     
     
     $('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor valido en Temperatura');}
                
            else
                {$(this).focus();}
                 } ); 
                              
                 
   //Fin de modificacion de rox              
    
    
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    

  
   


$('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').
      attr('data-bvalidator', 'between[0:5],required');
    
$('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').
      attr('data-bvalidator-msg', "Ingrese la temperatura de 0 a 5 grados");  
      
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