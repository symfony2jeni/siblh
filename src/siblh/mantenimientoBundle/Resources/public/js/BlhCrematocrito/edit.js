$(document).ready(function() { 
 
        
//para calculos///
 $('#siblh_mantenimientobundle_blhcrematocrito_crema1').keyup(function() {
            if (calcular1($(this).val()))
                {calcular3();
                 calcular4();}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_crema1').change(function() {
            if ($('#siblh_mantenimientobundle_blhcrematocrito_crema1').val()=='')
                {alert('Digite un valor valido para la crema 1'); }
            else
                {$('#siblh_mantenimientobundle_blhcrematocrito_crema1').focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_crema2').keyup(function() {
            if (calcular1($(this).val()))
                {calcular3();
                 calcular4();}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_crema2').change(function() {
            if ($('#siblh_mantenimientobundle_blhcrematocrito_crema2').val()=='')
                {alert('Digite un valor valido para la crema 2');}
            else
                {$('#siblh_mantenimientobundle_blhcrematocrito_crema2').focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_crema3').keyup(function() {
            if (calcular1($(this).val()))
                {calcular3();
                 calcular4();}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_crema3').change(function() {
            if ($('#siblh_mantenimientobundle_blhcrematocrito_crema3').val()=='')
                {alert('Digite un valor valido para la crema 3');}
            else
                {$('#siblh_mantenimientobundle_blhcrematocrito_crema3').focus();}
}       );


$('#siblh_mantenimientobundle_blhcrematocrito_ct1').keyup(function() {
            if (calcular2($(this).val()))
                {calcular3();
                 calcular4();}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_ct1').change(function() {
            if ($('#siblh_mantenimientobundle_blhcrematocrito_ct1').val()=='')
                {alert('Digite un valor valido para la columna 1');}
            else
                {$('#siblh_mantenimientobundle_blhcrematocrito_ct1').focus();}
}       );


$('#siblh_mantenimientobundle_blhcrematocrito_ct2').keyup(function() {
            if (calcular2($(this).val()))
                {calcular3();
                 calcular4();}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_ct2').change(function() {
            if ($('#siblh_mantenimientobundle_blhcrematocrito_ct2').val()=='')
                {alert('Digite un valor valido para la columna 2');}
            else
                {$('#siblh_mantenimientobundle_blhcrematocrito_ct2').focus();}
}       );


$('#siblh_mantenimientobundle_blhcrematocrito_ct3').keyup(function() {
            if (calcular2($(this).val()))
                {calcular3();
                 calcular4();}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_ct3').change(function() {
            if ($('#siblh_mantenimientobundle_blhcrematocrito_ct3').val()=='')
                {alert('Digite un valor valido para la columna 3');}
            else
                {$('#siblh_mantenimientobundle_blhcrematocrito_ct3').focus();}
}       );


/*
$('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').change(function() {
            if (calcular3($(this).val()))
                {}
            else
                {$(this).focus();}
}       );

$('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').change(function() {
            if (calcular3($(this).val()))
                {}
            else
                {$(this).focus();}
}       );

*/
////////////////
     $.noConflict();
   
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
    
  $('#boton').button();
  $('#boton1').button(); 
     

  

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    

  
 $('#siblh_mantenimientobundle_blhcrematocrito_crema1').
            attr('data-bvalidator', 'required');

  $('#siblh_mantenimientobundle_blhcrematocrito_crema2').
            attr('data-bvalidator', 'required,between[1:20]');
    
 $('#siblh_mantenimientobundle_blhcrematocrito_crema3').
            attr('data-bvalidator', 'required,between[1:20]');
    
 $('#siblh_mantenimientobundle_blhcrematocrito_ct1').
            attr('data-bvalidator', 'required,between[1:99]');
  
 
  $('#siblh_mantenimientobundle_blhcrematocrito_ct2').
            attr('data-bvalidator', 'required,between[1:99]');                         

 $('#siblh_mantenimientobundle_blhcrematocrito_ct3').
            attr('data-bvalidator', 'required,between[1:99]');
    

});

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}





/////////funcion para valores calculados//////

function calcular1(valor)
{
     
  $crema1 =  $('#siblh_mantenimientobundle_blhcrematocrito_crema1').val();
  $crema2 =  $('#siblh_mantenimientobundle_blhcrematocrito_crema2').val();
  $crema3 =  $('#siblh_mantenimientobundle_blhcrematocrito_crema3').val();
    if(valor !='')
     { if (($crema1 == '') || ($crema2 == '') || ($crema3 == '') || ($crema1 < 1) || ($crema1 > 20) || ($crema2 < 1) || ($crema2 > 20)  || ($crema3 < 1) || ($crema3 > 20) ) 
{ alert ('Digite valores validos para la crema');
    return false;}
    else {
$mediaCrema= (parseInt($crema1) + parseInt($crema2) + parseInt($crema3))/3;
//Redondeando el resultado a 2 decimales 
$mediaCrema = $mediaCrema.toFixed(2);
//$mediaCrema = Math.round($mediaCrema* 100) / 100;
           
            $('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').val($mediaCrema); 
            return true;
        } 
     }
     else
         {return false;}
}





function calcular2(valor)
{
     
  $ct1 = $('#siblh_mantenimientobundle_blhcrematocrito_ct1').val();
  $ct2 = $('#siblh_mantenimientobundle_blhcrematocrito_ct2').val();
  $ct3 = $('#siblh_mantenimientobundle_blhcrematocrito_ct3').val();
    if(valor !='')
     {  if (($ct1 == '') || ($ct2 == '') || ($ct3 == '') || ($ct1 < 1) || ($ct1 > 99) || ($ct2 < 1) || ($ct2 > 99)  || ($ct3 < 1) || ($ct3 > 99) ) 
{ alert ('Digite valores validos para las columnas totales');
    return false;}
    else {
 $mediaCt= (parseInt($ct1) + parseInt($ct2) + parseInt($ct3))/3;
//Redondeando el resultado a 2 decimales 
$mediaCt = $mediaCt.toFixed(2);
//$mediaCt = Math.round($mediaCt* 100) / 100; 
           
            $('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').val($mediaCt); 
            return true;
        } 
     }
     else
         {return false;}
}




function calcular3(valor)
{
     
  $mediaCrema = $('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').val();
    $mediaCt = $('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').val();
$porcentajeCrema=parseFloat($mediaCrema)/(parseFloat($mediaCt)*100);
//$porcentajeCrema= Math.round( $porcentajeCrema* 100) / 100;
 $porcentajeCrema=Math.round($porcentajeCrema*Math.pow(10,4))/Math.pow(10,4);
           
            $('#siblh_mantenimientobundle_blhcrematocrito_porcentajeCrema').val($porcentajeCrema); 
            return true;
         
 }
 
 
 
 
function calcular4(valor)
{
     
 $porcentajeCrema = $('#siblh_mantenimientobundle_blhcrematocrito_porcentajeCrema').val();

$kilocalorias = (parseFloat($porcentajeCrema)*268)+290;
//Redondeando el resultado a 2 decimales 
$kilocalorias= Math.round( $kilocalorias* 100) / 100;
            $('#siblh_mantenimientobundle_blhcrematocrito_kilocalorias').val($kilocalorias); 
            return true;
         
 }
 
 


