/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() { 
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
 
 
 //Calculando campos                        
/*var $tiempo1; 
var $tiempo2; 
var $tiempo3;  
var $valor1;
var $valorCurva;
  $('#siblh_mantenimientobundle_blhcurva_tiempo1').on('input', function() { 
    $tiempo1 = this.value;
});
 $('#siblh_mantenimientobundle_blhcurva_tiempo1').on('input', function() { 
    $tiempo1 = this.value;
});
$('#siblh_mantenimientobundle_blhcurva_tiempo2').on('input', function() { 
    $tiempo2 = this.value;
});
$('#siblh_mantenimientobundle_blhcurva_tiempo3').on('input', function() { 
    $tiempo3 = this.value;
    $valor1=parseInt($tiempo1)+parseInt($tiempo2)+parseInt($tiempo3);
    $valorCurva= Math.round(($valor1/3)* 100) / 100;  
}); */
    
$('#siblh_mantenimientobundle_blhcurva_tiempo1').keyup(function(){
    $('#siblh_mantenimientobundle_blhcurva_valorCurva').click();
    
});

$('#siblh_mantenimientobundle_blhcurva_tiempo2').keyup(function(){
    $('#siblh_mantenimientobundle_blhcurva_valorCurva').click();
    
});

$('#siblh_mantenimientobundle_blhcurva_tiempo3').keyup(function(){
    $('#siblh_mantenimientobundle_blhcurva_valorCurva').click();
    
});


$('#siblh_mantenimientobundle_blhcurva_valorCurva').on ('click', function() {
  
$tiempo1 = ($('#siblh_mantenimientobundle_blhcurva_tiempo1').val()==='')?5:$('#siblh_mantenimientobundle_blhcurva_tiempo1').val();
$tiempo2 = ($('#siblh_mantenimientobundle_blhcurva_tiempo2').val()==='')?5:$('#siblh_mantenimientobundle_blhcurva_tiempo2').val();
$tiempo3 = ($('#siblh_mantenimientobundle_blhcurva_tiempo3').val()==='')?5:$('#siblh_mantenimientobundle_blhcurva_tiempo3').val();

if (($tiempo1 > 10) || ($tiempo2 > 10) || ($tiempo3 > 10) ) 
{ alert ('Digite valores validos para los tiempos1');
    return false;}
else {
    


    $tiempo1 = ($('#siblh_mantenimientobundle_blhcurva_tiempo1').val()==='')?'a1':$('#siblh_mantenimientobundle_blhcurva_tiempo1').val();
$tiempo2 = ($('#siblh_mantenimientobundle_blhcurva_tiempo2').val()==='')?'a2':$('#siblh_mantenimientobundle_blhcurva_tiempo2').val();
$tiempo3 = ($('#siblh_mantenimientobundle_blhcurva_tiempo3').val()==='')?'a3':$('#siblh_mantenimientobundle_blhcurva_tiempo3').val();
//alert($tiempo1 + '-'+$tiempo2+'-'+$tiempo3);
if($tiempo1==='a1')
{
    $tiempo1=0;
}

if($tiempo2==='a2')
{
    $tiempo2=0;
}

if($tiempo3==='a3')
{
    $tiempo3=0;
}

if($tiempo1!== 0)
{
    if (($tiempo1 < 5))
    {
            alert ('Digite valores validos para los tiempos');
    return false;
    }
}
   
   
if($tiempo2!== 0)
{
    if (($tiempo2 < 5))
    {
            alert ('Digite valores validos para los tiempos');
    return false;
    }
}

if($tiempo3!== 0)
{
    if (($tiempo3 < 5))
    {
            alert ('Digite valores validos para los tiempos');
    return false;
    }
}

 $valor1=parseInt($tiempo1)+parseInt($tiempo2)+parseInt($tiempo3);
    $valorCurva= Math.round(($valor1/3)* 100) / 100;     
    
this.value = $valorCurva; }
} ); 


 
 
 
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





    $('#siblh_mantenimientobundle_blhcurva_valorCurva').
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

