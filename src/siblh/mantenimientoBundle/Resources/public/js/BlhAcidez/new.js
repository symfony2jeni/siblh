$(document).ready(function() { 
   $('button').button();
   $('#siblh_mantenimientobundle_blhacidez_acidez1').
        attr('data-bvalidator', 'between[1:300],required');
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
      $.noConflict();
    $('form').bValidator(optionsRed);
    
   
    
});

