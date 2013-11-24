$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
       //Calendario  
     $('input[id$="_fechaSeguimiento"]').datepicker({ dateFormat: 'dd-mm-yy',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                          defaultDate: '01-01-2012',
                            yearRange: '2012:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });  
    //Tooltip                      
 
       
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });  
  
       
    //Boton   
    
    $('#boton')
      .button();
     
  
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_fechaSeguimiento').
            attr('data-bvalidator', 'required');

  $('#siblh_mantenimientobundle_blhseguimientoreceptor_semana').
            attr('data-bvalidator', 'required,min[1]');

    
     
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').
            attr('data-bvalidator', 'required,between[20:40]');
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').
            attr('data-bvalidator', 'required,between[400:2500]');
  
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').
            attr('data-bvalidator', 'required,between[0:100]');
 
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').
            attr('data-bvalidator', 'required,between[30:60]');
    
    
  $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').
            attr('data-bvalidator', 'required,between[0:10]');
    

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);


});



      

