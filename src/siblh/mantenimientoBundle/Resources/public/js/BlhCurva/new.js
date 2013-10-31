/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $(document).ready(function() { 
      $('button').button(); 
      $.noConflict();
      
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaCurva"]').datepicker({ dateFormat: 'yy-MM-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: '-0y-01-01',
                           yearRange: '-0y:-0y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                          
   $('#siblh_mantenimientobundle_blhcurva_tiempo1').
        attr('data-bvalidator', 'between[5:10],required');                      
                          
   $('#siblh_mantenimientobundle_blhcurva_tiempo2').
        attr('data-bvalidator', 'between[5:10],required');
                           
   $('#siblh_mantenimientobundle_blhcurva_tiempo3').
        attr('data-bvalidator', 'between[5:10],required');

   $('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').
        attr('data-bvalidator', 'between[5:25],required');

   $('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').
        attr('data-bvalidator', 'between[25:75],required');
   
   
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
    
    $('form').bValidator(optionsRed);

 });
 
 
 
  
