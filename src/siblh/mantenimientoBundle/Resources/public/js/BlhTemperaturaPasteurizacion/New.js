/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() { 
    $.noConflict();
   $('#boton').button();
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         
    $('form').bValidator(optionsRed);
    
   

$('#siblh_mantenimientobundle_blhtemperaturapasteurizacion_temperaturaP').
        attr('data-bvalidator', 'between[62.5:66],required');
    
$('#siblh_mantenimientobundle_blhtemperaturapasteurizacion_temperaturaP').
        attr('data-bvalidator-msg', "Ingrese valores para la temperatura de 62.5 a 66 grados C");  

});

function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 
 
 
  
