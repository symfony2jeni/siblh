$(document).ready(function() { 
 
   $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').
        attr('data-bvalidator', 'between[100:200],required');
$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').
        attr('data-bvalidator', 'between[22:136],required');
 
 $('#siblh_mantenimientobundle_blhhistoriaactual_imc').attr('readonly','readonly');
  
 
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
     



 
          $('#siblh_mantenimientobundle_blhhistoriaactual_imc').
            attr('data-bvalidator', 'required');           
           
   $('#button').button();
   $('#boton1').button();
   
   $('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val();
     $valor = parseFloat($valor);  
   //  alert(typeof $valor);
    if (($valor < 22) ||  ($valor > 136))
      {
          alert ("El peso debe estar entre 22 kg y 136 kg");
          $(this).focus();
          return false;
      }
      else {
           $talla= ($('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val()=='')?1:$('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val();
                         $peso = $('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val();
                          $aux= Math.pow($talla,2);
                        $imc = $peso / $aux;
                        $imc=$imc.toFixed(4);
                        $('#siblh_mantenimientobundle_blhhistoriaactual_imc').val($imc); 
      }
});  

   $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val();
     $valor = parseFloat($valor);  
   //  alert(typeof $valor);
    if (($valor < 100) ||  ($valor > 200))
      {
          alert ("La talla debe estar entre 100 cm y 200 cm");
          $(this).focus();
          return false;
      }
      
      else {
          $talla= $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val();
          $peso = ($('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val()=='')?1:$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val();
          $aux= Math.pow($talla,2);
          $imc = $peso / $aux;
          $imc=$imc.toFixed(4);
          $('#siblh_mantenimientobundle_blhhistoriaactual_imc').val($imc); 
      }
});  

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
