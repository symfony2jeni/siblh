$(document).ready(function() { 
    
    
        $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').blur(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').change(function() {
            if ($('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val()=='')
                {alert('Digite un valor valido para la talla de la donante');}
            else
                {$('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').focus();}
}       );



$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').blur(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );


$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').change(function() {
            if ($('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val()=='')
                {alert('Digite un valor valido para el peso de la donante');}
            else
                {$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').focus();}
}       );


///////////////////////////////

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
           
           
/*           
 $('#siblh_mantenimientobundle_blhhistoriaactual_imc').on ('click', function() {
  $talla= $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val();
 $peso = $('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val();
 
  if (($talla == '') || ($peso == '')) 
{ alert ('Digite valores validos para el peso y talla');
    return false;}
else {
 
 
 $aux= Math.pow($talla,2);
 $imc = $peso / $aux;
 $imc=$imc.toFixed(4);
this.value = $imc; 
 }
} );  */

          
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

/////////funcion para valores calculados//////

function calcular(valor)
{
     
 $talla= $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').val();
 $peso = $('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').val();
    if(valor !='')
     {if (($talla == '') || ($peso == '')|| ($talla <100) || ($talla > 200) || ($peso <22) || ($peso >136) ) 
        { 
            alert ('Digite valores validos para el peso y talla');
            return false;
        }
    else {
            
 $aux= Math.pow($talla,2);
 $imc = $peso / $aux;
 $imc=$imc.toFixed(4);
           
            $('#siblh_mantenimientobundle_blhhistoriaactual_imc').val($imc); 
            return true;
        } 
     }
     else
         {return false;}
}
