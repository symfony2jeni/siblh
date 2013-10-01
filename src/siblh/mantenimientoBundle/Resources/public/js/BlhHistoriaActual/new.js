

$(document).ready(function() { 
   $('button').button();
   $('#siblh_mantenimientobundle_blhhistoriaactualtype_talladonante').
        attr('data-bvalidator', 'between[1:2],required');
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
});

