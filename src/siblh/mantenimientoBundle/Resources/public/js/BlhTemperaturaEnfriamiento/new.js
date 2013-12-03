$(document).ready(function() { 
   $('button').button();
   
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    
   

$('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').
        attr('data-bvalidator', 'between[5:30],required');
    
$('#siblh_mantenimientobundle_blhtemperaturaenfriamiento_temperaturaE').
        attr('data-bvalidator-msg', "Ingrese valores para la temperatura entre 0 y 30");  

});