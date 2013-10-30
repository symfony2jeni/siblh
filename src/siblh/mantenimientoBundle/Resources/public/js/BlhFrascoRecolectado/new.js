$(document).ready(function() { 
   $('button').button();
   $('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').
        attr('data-bvalidator', 'between[1:300],required');
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    
    
    $('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').on('input', function() {
    
    $ml = this.value;
    $onz = $ml * 0.033814;
    
   
});

 $('#siblh_mantenimientobundle_blhfrascorecolectado_onzRecolectado').on ('click', function() {
 
this.value = $onz; } ) 
    
});

