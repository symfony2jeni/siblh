$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
       //Calendario  
     $('input[id$="_fechaSolicitud"]').datepicker({ dateFormat: 'dd-mm-yy',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                          defaultDate: '2012-01-01',
                            yearRange: '2012:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });  
    //Tooltip                      
 
    $( document ).tooltip();
  
       
    //Boton   
    
    $('#submit')
      .button();
      click(function( event ) {
        event.preventDefault();
      });
       
 
  

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
 $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').
         attr('data-bvalidator-msg', "Ingrese un numero entre 0 y 25");
    
     
 $('#siblh_mantenimientobundle_blhsolicitud_caloriasNecesarias').
            attr('data-bvalidator', 'min[1],required');
    
 $('#siblh_mantenimientobundle_blhsolicitud_pesoDia').
            attr('data-bvalidator', 'between[400:2500],number,required');
  $('#siblh_mantenimientobundle_blhsolicitud_pesoDia').
         attr('data-bvalidator-msg', "Ingrese un numero entre 400 y 2500");
    
 $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').
            attr('data-bvalidator', 'between[0:24],number,required');
  $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').
         attr('data-bvalidator-msg', "Ingrese un numero entre 0 y 24");
    
 $('#siblh_mantenimientobundle_blhsolicitud_cuna').
            attr('data-bvalidator', 'min[1],required');
    
    
  $('#siblh_mantenimientobundle_blhsolicitud_responsable').
            attr('data-bvalidator', 'alpha,required');


                          


});



      

