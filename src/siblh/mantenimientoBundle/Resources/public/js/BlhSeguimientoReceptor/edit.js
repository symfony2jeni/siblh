$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
       //Calendario  
     $('input[id$="_fechaSeguimiento"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '2012-10-08',
                           maxDate: 'today',
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
      $('#boton1')
      .button();
     
  
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_fechaSeguimiento').
            attr('data-bvalidator', 'required');

  $('#siblh_mantenimientobundle_blhseguimientoreceptor_semana').
            attr('data-bvalidator', 'required,min[1]');

    
     
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').
            attr('data-bvalidator', 'required,between[20:40]');
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').
            attr('data-bvalidator', 'required,between[500:5000]');
  
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').
            attr('data-bvalidator', 'required,between[0:50]');
 
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').
            attr('data-bvalidator', 'required,between[25:55]');
    
    
  $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').
            attr('data-bvalidator', 'required,between[0:5]');
    

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);


});

function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}



      

