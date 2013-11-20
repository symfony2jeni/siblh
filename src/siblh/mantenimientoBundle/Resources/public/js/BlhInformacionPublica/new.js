
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 $(document).ready(function() { 
     
      $.noConflict();
      
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaPublicacion"]').datepicker({ dateFormat: 'yy-MM-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: '-0y-01-01',
                           yearRange: '-0y:-0y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });

    $('#boton').button(); 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
    
    $('form').bValidator(optionsRed);

 });
