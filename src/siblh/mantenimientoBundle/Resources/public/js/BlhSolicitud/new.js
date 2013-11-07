$(document).ready(function() { 
     $('#button').button();
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
  
       
       
    //Dialog
    
$( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
       
       
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

    
     
 $('#siblh_mantenimientobundle_blhsolicitud_caloriasNecesarias').
            attr('data-bvalidator', 'min[1],required');
    
 $('#siblh_mantenimientobundle_blhsolicitud_pesoDia').
            attr('data-bvalidator', 'between[400:2500],required');
  
    
 $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').
            attr('data-bvalidator', 'between[0:24],required');
 
    
 $('#siblh_mantenimientobundle_blhsolicitud_cuna').
            attr('data-bvalidator', 'min[1],required');
    
    
  $('#siblh_mantenimientobundle_blhsolicitud_responsable').
            attr('data-bvalidator', 'alpha');


  //Calculando campos                        

var $VolumenToma; 
var $VolumenDia;
  $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').on('input', function() {
    
    $VolumenToma = this.value;
   
    
   
});

   $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').on('input', function() {
    
     var $TomasDia = this.value;
     $VolumenDia = $VolumenToma * $TomasDia;
    
   
});

$('#siblh_mantenimientobundle_blhsolicitud_volumenPorDia').on ('click', function() {
 
this.value = $VolumenDia; } ); 

});



      
