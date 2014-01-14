$(document).ready(function() { 
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaEgreso"]').datepicker({ dateFormat: 'yy-MM-dd',  
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
  //      attr('data-bvalidator', 'between[0:],required');

  $('#siblh_mantenimientobundle_blhegresoreceptor_estanciaHospitalaria').
        attr('data-bvalidator', "required,between[1:120]");
    
$('#siblh_mantenimientobundle_blhegresoreceptor_permanenciaUcin').
        attr('data-bvalidator', "required,between[1:120]");

 $('#button').button(); 
 $('#boton').button(); 
   
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