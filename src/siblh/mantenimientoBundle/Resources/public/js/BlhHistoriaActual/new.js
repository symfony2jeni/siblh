$(document).ready(function() { 
 
   $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').
        attr('data-bvalidator', 'between[100:200],required');
$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').
        attr('data-bvalidator', 'between[22:136],required');
 
  
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    
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
           
        

 
 $('#siblh_mantenimientobundle_blhhistoriaactual_imc').on ('click', function() {
  $talla= $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val();
 $peso = $('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val();
 $aux= Math.pow($talla,2);
 $imc = $peso / $aux;
 $imc=$imc.toFixed(4);
this.value = $imc; 
} ); 

           
           
           
           
           
   $('#button').button();
   $('#boton1').button();
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