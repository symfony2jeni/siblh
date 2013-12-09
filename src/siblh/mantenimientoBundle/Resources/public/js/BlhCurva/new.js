/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() { 
    $.noConflict();
   $('#boton').button();

      
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaCurva"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           maxDate: 'todate',
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: '01-01-2012',
                           yearRange: '2012:y',
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
        attr('data-bvalidator', 'between[5:100],required');

$('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').
        attr('data-bvalidator', 'between[30:130],required');
    
$('#siblh_mantenimientobundle_blhcurva_fechaCurva').
        attr('data-bvalidator',  "regex['/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/']");   
 
    //Opciones del validador
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




  

});
    
function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8)|| (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
 
function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 
 
 
function soloTexto(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 
  

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
