$(document).ready(function() { 
     //$('#button').button();
     $.noConflict();
  
    //Tooltip                      
 
    $( document ).tooltip();
  
       
    //Boton   
   
    $( "#boton" ).button();
      
      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);

  
 $('#siblh_mantenimientobundle_blhsolicitud_fechaSolicitud').
            attr('data-bvalidator', 'date[dd.mm.yyyy],required');

 $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').
            attr('data-bvalidator', 'between[0:25],required');


});



      



