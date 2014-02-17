$(document).ready(function() { 
    
    //Inicio de modificacion de rox
    
     // Cantidad
$('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').change(function() {
            if (($(this).val()< 10 || $(this).val()> 60) || $(this).val()=='')
                {alert('Digite un valor valido para Cantidad de Frascos');
                $('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').val(''); }
                
            else
                {$('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').focus();}
} );
    
    
    
     // Volumen
$('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').change(function() {
            if (($(this).val()< 60 || $(this).val()> 500) || $(this).val()=='')
                {alert('Digite un valor valido para Volumen de Frascos');
                $('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').val(''); }
                
            else
                {$('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').focus();}
} );
    
        
    //Fin de modificacion de rox
      
        $('#siblh_mantenimientobundle_blhcurva_tiempo1').keyup(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhcurva_tiempo1').change(function() {
            if ($('#siblh_mantenimientobundle_blhcurva_tiempo1').val()=='')
                {alert('Digite un valor valido para el primer tiempo');}
            else
                {$('#siblh_mantenimientobundle_blhcurva_tiempo1').focus();}
}       );


        $('#siblh_mantenimientobundle_blhcurva_tiempo2').keyup(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhcurva_tiempo2').change(function() {
            if ($('#siblh_mantenimientobundle_blhcurva_tiempo2').val()=='')
                {alert('Digite un valor valido para el segundo tiempo');}
            else
                {$('#siblh_mantenimientobundle_blhcurva_tiempo2').focus();}
}       );


        $('#siblh_mantenimientobundle_blhcurva_tiempo3').keyup(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhcurva_tiempo3').change(function() {
            if ($('#siblh_mantenimientobundle_blhcurva_tiempo3').val()=='')
                {alert('Digite un valor valido para el tercer tiempo');}
            else
                {$('#siblh_mantenimientobundle_blhcurva_tiempo3').focus();}
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
            attr('data-bvalidator', 'required,between[60:500]');
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

function calcular(valor)
{
     
$tiempo1 = $('#siblh_mantenimientobundle_blhcurva_tiempo1').val();
$tiempo2 = $('#siblh_mantenimientobundle_blhcurva_tiempo2').val();
$tiempo3 = $('#siblh_mantenimientobundle_blhcurva_tiempo3').val();
    if(valor !='')
     {if (($tiempo1 == '') || ($tiempo2 == '') || ($tiempo3 == '') || ($tiempo1 < 5) || ($tiempo1 > 10) || ($tiempo2 < 5) || ($tiempo2 > 10)  || ($tiempo3 < 5) || ($tiempo3 > 10) ) 
{ alert ('Digite valores validos para los tiempos');
    return false;}
    else {
            
 $valor1=parseInt($tiempo1)+parseInt($tiempo2)+parseInt($tiempo3);
 $valorCurva = $valor1 /3;
 $valorCurva =  $valorCurva.toFixed(4);  
 
           
            $('#siblh_mantenimientobundle_blhcurva_valorCurva').val($valorCurva); 
            return true;
        } 
     }
     else
         {return false;}
}



