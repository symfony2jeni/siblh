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
        attr('data-bvalidator', 'between[5:30],required');
    
$('#siblh_mantenimientobundle_blhtemperaturapasteurizacion_temperaturaP').
        attr('data-bvalidator-msg', "Ingrese valores para la temperatura entre 5 y 30");  

});

function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 
 
 
  
