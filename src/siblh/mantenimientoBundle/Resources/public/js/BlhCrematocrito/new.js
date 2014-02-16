$(document).ready(function() { 
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
    
    
$('#siblh_mantenimientobundle_blhcrematocrito_ct1').keyup(function(){
   calcularMediaCt(); 
});
    
$('#siblh_mantenimientobundle_blhcrematocrito_ct2').keyup(function(){
   calcularMediaCt(); 
});

$('#siblh_mantenimientobundle_blhcrematocrito_ct3').keyup(function(){
   calcularMediaCt(); 
});

$('#siblh_mantenimientobundle_blhcrematocrito_crema1').keyup(function(){
   calcularMediaCrema(); 
});


$('#siblh_mantenimientobundle_blhcrematocrito_crema2').keyup(function(){
   calcularMediaCrema(); 
});

$('#siblh_mantenimientobundle_blhcrematocrito_crema3').keyup(function(){
   calcularMediaCrema(); 
});


 $('#siblh_mantenimientobundle_blhcrematocrito_crema1').
            attr('data-bvalidator', 'required,between[1:20]');

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
    
    
    //Calculando campos                        

var $crema1; 
var $crema2; 
var $crema3; 
var $ct1; 
var $ct2; 
var $ct3; 
var $mediaCrema;
var $mediaCt;
var $porcentajeCrema;
var $kilocalorias;

//CREMA
    
function calcularMediaCrema() {
  $crema1 =  ($('#siblh_mantenimientobundle_blhcrematocrito_crema1').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_crema1').val();
  $crema2 =  ($('#siblh_mantenimientobundle_blhcrematocrito_crema2').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_crema2').val();
  $crema3 =  ($('#siblh_mantenimientobundle_blhcrematocrito_crema3').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_crema3').val();
  
   if (($crema1 == '') || ($crema2 == '') || ($crema3 == '') || ($crema1 < 1) || ($crema1 > 20) || ($crema2 < 1) || ($crema2 > 20)  || ($crema3 < 1) || ($crema3 > 20) ) 
{ alert ('Digite valores validos para la crema');
    return false;}
else {
    
    $crema1 =  ($('#siblh_mantenimientobundle_blhcrematocrito_crema1').val()=='')?'a1':$('#siblh_mantenimientobundle_blhcrematocrito_crema1').val();
  $crema2 =  ($('#siblh_mantenimientobundle_blhcrematocrito_crema2').val()=='')?'a2':$('#siblh_mantenimientobundle_blhcrematocrito_crema2').val();
  $crema3 =  ($('#siblh_mantenimientobundle_blhcrematocrito_crema3').val()=='')?'a3':$('#siblh_mantenimientobundle_blhcrematocrito_crema3').val();
  
  if ($crema1 == 'a1')
    {
        $crema1=0;
    }
   
   if ($crema2 == 'a2')
    {
        $crema2=0;
    }
   
   if ($crema3 == 'a3')
    {
        $crema3=0;
    }
   
     $mediaCrema= (parseInt($crema1) + parseInt($crema2) + parseInt($crema3))/3;

//Redondeando el resultado a 2 decimales 
$mediaCrema = Math.round($mediaCrema* 100) / 100;
 

$('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').val($mediaCrema); 
calcularPorcCrema();
}}

//COLIFORMES


function calcularMediaCt() {
 
  $ct1 = ($('#siblh_mantenimientobundle_blhcrematocrito_ct1').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_ct1').val();
  $ct2 = ($('#siblh_mantenimientobundle_blhcrematocrito_ct2').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_ct2').val();
  $ct3 = ($('#siblh_mantenimientobundle_blhcrematocrito_ct3').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_ct3').val();
 
 if (($ct1 == '') || ($ct2 == '') || ($ct3 == '') || ($ct1 < 1) || ($ct1 > 99) || ($ct2 < 1) || ($ct2 > 99)  || ($ct3 < 1) || ($ct3 > 99) ) 
{ alert ('Digite valores validos para las columnas totales');
    return false;}
else {

  $ct1 = ($('#siblh_mantenimientobundle_blhcrematocrito_ct1').val()=='')?'a1':$('#siblh_mantenimientobundle_blhcrematocrito_ct1').val();
  $ct2 = ($('#siblh_mantenimientobundle_blhcrematocrito_ct2').val()=='')?'a2':$('#siblh_mantenimientobundle_blhcrematocrito_ct2').val();
  $ct3 = ($('#siblh_mantenimientobundle_blhcrematocrito_ct3').val()=='')?'a3':$('#siblh_mantenimientobundle_blhcrematocrito_ct3').val();
 
 
  if ($ct1 == 'a1')
    {
        $ct1=0;
    }
   
   if ($ct2 == 'a2')
    {
        $ct2=0;
    }
   
   if ($ct3 == 'a3')
    {
        $ct3=0;
    }
    $mediaCt= (parseInt($ct1) + parseInt($ct2) + parseInt($ct3))/3;
//Redondeando el resultado a 2 decimales 
$mediaCt = Math.round($mediaCt* 100) / 100; 
$('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').val($mediaCt); 
}
calcularPorcCrema();
    } 






function calcularPorcCrema() {
    $mediaCrema = ($('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').val()=='')?0:$('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').val();
    $mediaCt = ($('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').val()=='')?1:$('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').val();
    
   
        
           
    if (($mediaCrema == '') || ($mediaCt ==='')) 
{ alert ('Para obtener este valor necesita calcular las medias de la crema y columnas totales');
    return false;}
else {
 $porcentajeCrema=$mediaCrema/($mediaCt*100);
//$porcentajeCrema= Math.round( $porcentajeCrema* 100) / 100;
 $porcentajeCrema=Math.round($porcentajeCrema*Math.pow(10,4))/Math.pow(10,4);
$('#siblh_mantenimientobundle_blhcrematocrito_porcentajeCrema').val($porcentajeCrema);
$('#siblh_mantenimientobundle_blhcrematocrito_kilocalorias').click();
}
}

$('#siblh_mantenimientobundle_blhcrematocrito_kilocalorias').on ('click', function() {
$porcentajeCrema = $('#siblh_mantenimientobundle_blhcrematocrito_porcentajeCrema').val();
if ($porcentajeCrema == '')
{ alert ('Para obtener este valor necesita calcular el porcentaje de crema');
    return false;}
else {
$kilocalorias = ($porcentajeCrema*268)+290;
//Redondeando el resultado a 2 decimales 
$kilocalorias= Math.round( $kilocalorias* 100) / 100;
 
this.value = $kilocalorias; } } ); 

      $('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').
            attr('data-bvalidator', 'required');
    
          $('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').
            attr('data-bvalidator', 'required');
    
          $('#siblh_mantenimientobundle_blhcrematocrito_porcentajeCrema').
            attr('data-bvalidator', 'required');
    
          $('#siblh_mantenimientobundle_blhcrematocrito_kilocalorias').
            attr('data-bvalidator', 'required');


});

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
