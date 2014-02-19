$(document).ready(function() {

 
    
     // Cantidad
$('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').blur(function() {
            if (($(this).val()< 10 || $(this).val()> 60) || $(this).val()=='')
                {alert('Digite un valor valido entre 10 y 60 para cantidad de frascos');
                    $(this).focus();
                  return false;
                    
               }
                
           }       );    
    
    
    
     // Volumen
$('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').blur(function() {
            if (($(this).val()< 30 || $(this).val()> 500) || $(this).val()=='')
                {alert('Digite un valor valido entre 30 y 500 para Volumen de Frascos');
               $(this).focus();
               return false;
                }
               
}       );    
    
        

 
      
        $('#siblh_mantenimientobundle_blhcurva_tiempo1').blur(function() {
           $tiempo1=$('#siblh_mantenimientobundle_blhcurva_tiempo1').val();
    if (($tiempo1 <5) || ($tiempo1>10))
        {alert("El tiempo debe estar entre 5 y 10");
         $(this).focus();
         return false;}
        else {    
   calcular(); }
}       );



        $('#siblh_mantenimientobundle_blhcurva_tiempo2').blur(function() {
             $tiempo1=$('#siblh_mantenimientobundle_blhcurva_tiempo2').val();
    if (($tiempo1 <5) || ($tiempo1>10))
        {alert("El tiempo debe estar entre 5 y 10");
         $(this).focus();
         return false;}
        else {    
   calcular(); }
}       );



        $('#siblh_mantenimientobundle_blhcurva_tiempo3').blur(function() {
            $tiempo1=$('#siblh_mantenimientobundle_blhcurva_tiempo3').val();
    if (($tiempo1 <5) || ($tiempo1>10))
        {alert("El tiempo debe estar entre 5 y 10");
         $(this).focus();
         return false;}
        else {    
   calcular(); }
}       );


    $.noConflict();
   $('#boton').button();
   $('#boton1').button();

      
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaCurva"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           minDate:'-7d',
                           maxDate: 'today',
                           clearStatus: 'Borra fecha actual',  
                           //defaultDate: '01-01-2012',
                           yearRange: '2013:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
 

 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 

    //Validar el formulario
    
    $('form').bValidator(optionsRed);
    
    
    //funcion para presentacion de mensajes
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

$('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').
            attr('data-bvalidator', 'required,between[10:60]');
$('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').
            attr('data-bvalidator', 'required,between[30:500]');
$('#siblh_mantenimientobundle_blhcurva_tiempo1').
            attr('data-bvalidator', 'required,between[5:10]');
$('#siblh_mantenimientobundle_blhcurva_tiempo2').
            attr('data-bvalidator', 'required,between[5:10]');
$('#siblh_mantenimientobundle_blhcurva_tiempo3').
            attr('data-bvalidator', 'required,between[5:10]');
$('#siblh_mantenimientobundle_blhcurva_fechaCurva').
            attr('data-bvalidator', 'required');
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


/////////funcion para valores calculados//////

function calcular()
{
     
$tiempo1 = $('#siblh_mantenimientobundle_blhcurva_tiempo1').val();
$tiempo2 = $('#siblh_mantenimientobundle_blhcurva_tiempo2').val();
$tiempo3 = $('#siblh_mantenimientobundle_blhcurva_tiempo3').val();

            
 $valor1=parseInt($tiempo1)+parseInt($tiempo2)+parseInt($tiempo3);
 $valorCurva = $valor1 /3;
 $valorCurva =  $valorCurva.toFixed(4);  
 
           
            $('#siblh_mantenimientobundle_blhcurva_valorCurva').val($valorCurva); 
            
        } 
    




