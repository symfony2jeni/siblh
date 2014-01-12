$(document).ready(function() { 
 
     $.noConflict();
     $('#siblh_mantenimientobundle_blhdonacion_fechaDonacion').
        attr('data-bvalidator', 'required');
 
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaDonacion"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: 'today',
                           maxDate: 'today',
                          // yearRange: '2012:y',  
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                          
     
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
                          



$(function() {
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
        
           });

    $('#button').button();
   $('#boton1').button();
   
    $('#responsable').on ('click', function() {
    $('#siblh_mantenimientobundle_blhdonacion_responsableDonacion').val (this.value); 
    ;
    });

});



      

