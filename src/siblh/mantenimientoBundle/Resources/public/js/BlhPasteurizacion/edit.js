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
      attr('data-bvalidator', 'min[1],required');
    
$('#siblh_mantenimientobundle_blhpasteurizacion_numFrascosPasteurizados').
      attr('data-bvalidator-msg', "Ingrese la cantidad de frascos mayor que 1");  
      
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
 $('#button').button();
 $('#boton1').button();
  $('#button').on('click',function() {
     
 $hpinicio = $('#siblh_mantenimientobundle_blhpasteurizacion_horaInicioP_hour').val();
 $hpfinal = $('#siblh_mantenimientobundle_blhpasteurizacion_horaFinalP_hour').val();
 $hip = Number($hpinicio);
 $hfp = Number($hpfinal);
 
 $heinicio = $('#siblh_mantenimientobundle_blhpasteurizacion_horaInicioE_hour').val();
 $hefinal = $('#siblh_mantenimientobundle_blhpasteurizacion_horaFinalE_hour').val();
 $hie = Number($heinicio);
 $hfe = Number($hefinal);
      //alert ($hpinicio);
    // alert (typeof $hi);
     
      if (($hfp < $hip) || ($hfe < $hie)) {
     alert ("La hora de finalizacion debe ser mayor a la hora inicio, revise las horas de pasteurizacion y enfriamiento");
     return false;
     }
     else {if (($hfp == $hip) || ($hfe == $hie)) {
         $mpinicio = $('#siblh_mantenimientobundle_blhpasteurizacion_horaInicioP_minute').val();
         $mpfinal = $('#siblh_mantenimientobundle_blhpasteurizacion_horaFinalP_minute').val();
         $mip = Number($mpinicio);
         $mfp = Number($mpfinal);
         
         $meinicio = $('#siblh_mantenimientobundle_blhpasteurizacion_horaInicioE_minute').val();
         $mefinal = $('#siblh_mantenimientobundle_blhpasteurizacion_horaFinalE_minute').val();
         $mie = Number($meinicio);
         $mfe = Number($mefinal);
      if (($mfp < $mip) || ($mfe < $mie)) {
     alert ("La hora de finalizacion debe ser mayor a la hora inicio, revise las horas de pasteurizacion y enfriamiento");
     return false;
     }
     }
          }
     
 });  
});