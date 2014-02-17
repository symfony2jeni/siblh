$(document).ready(function() { 
     $('button').button();
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaEgreso"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: $('#fecha').val(),
                           minDate: $('#fecha').val(),
                           maxDate: 'today',
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
                          
//$('#siblh_mantenimientobundle_blhegresoreceptor_estanciaHospitalaria').
  //attr('data-bvalidator', 'between[0:],required');

  $('#siblh_mantenimientobundle_blhegresoreceptor_estanciaHospitalaria').
        attr('data-bvalidator', "required,between[1:120]");
    
$('#siblh_mantenimientobundle_blhegresoreceptor_permanenciaUcin').
        attr('data-bvalidator', "required,between[1:120]");

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
    
  $('#siblh_mantenimientobundle_blhegresoreceptor_estanciaHospitalaria').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhegresoreceptor_estanciaHospitalaria').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 1) ||  ($valor > 120))
      {
          alert ("Los dias de estancia hospitalaria deben estar entre 1 y 120 dias");
          $(this).focus();
          return false;
      }
});  
 
   $('#siblh_mantenimientobundle_blhegresoreceptor_permanenciaUcin').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhegresoreceptor_permanenciaUcin').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 1) ||  ($valor > 20))
      {
          alert ("Los dias de permanencia en UCIN deben estar entre 1 y 20 dias");
          $(this).focus();
          return false;
      }
});  
    
    
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
if ((keynum === 8) || (keynum === 46) )
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}