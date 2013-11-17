$(document).ready(function() { 
   $('button').button();
   
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    

  $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaPasteurizacion"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '-7d',
                           maxDate: 'today',
                        //yearRange: '-35y:-13y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                             
   


$('#siblh_mantenimientobundle_blhpasteurizacion_volumenPasteurizado').
      attr('data-bvalidator', 'between[1:30],required');
    
$('#siblh_mantenimientobundle_blhpasteurizacion_volumenPasteurizado').
      attr('data-bvalidator-msg', "Ingrese el volumen en ml de 1 a 30 ml");  
      
$('#siblh_mantenimientobundle_blhpasteurizacion_numFrascosPasteurizados').
      attr('data-bvalidator', 'between[1:30],required');
    
$('#siblh_mantenimientobundle_blhpasteurizacion_numFrascosPasteurizados').
      attr('data-bvalidator-msg', "Ingrese la cantidad de frascos entre 1 y 30");  
      
$('#siblh_mantenimientobundle_blhpasteurizacion_numFrascosPasteurizados').on('click', function() {    
    this.value=$('#cant').val();
    
    });
    
$('#siblh_mantenimientobundle_blhpasteurizacion_volumenPasteurizado').on('click', function() {    
    this.value =$('#vol').val();
    
    });    
  
      
      


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

    
});