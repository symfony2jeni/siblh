/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() { 
   $('button').button();
    $.noConflict();


 $('#siblh_mantenimientobundle_blhtemperaturapasteurizacion_temperaturaP').
        attr('data-bvalidator', 'between[5:10],required');
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
    
    $('form').bValidator(optionsRed);


});

