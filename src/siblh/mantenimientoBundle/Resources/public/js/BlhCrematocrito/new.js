$(document).ready(function() { 
     /*$('button').button();*/
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
    
    $('#boton')
      .button();
     

  

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    

  
 $('#siblh_mantenimientobundle_blhcrematocrito_crema1').
            attr('data-bvalidator', 'required,between[1:100]');

  $('#siblh_mantenimientobundle_blhcrematocrito_crema2').
            attr('data-bvalidator', 'required,between[1:100]');
    
 $('#siblh_mantenimientobundle_blhcrematocrito_crema3').
            attr('data-bvalidator', 'required,between[1:100]');
    
 $('#siblh_mantenimientobundle_blhcrematocrito_ct1').
            attr('data-bvalidator', 'required,between[1:100]');
  
 
  $('#siblh_mantenimientobundle_blhcrematocrito_ct2').
            attr('data-bvalidator', 'required,between[1:100]');                         

 $('#siblh_mantenimientobundle_blhcrematocrito_ct3').
            attr('data-bvalidator', 'required,between[1:100]');
    
    
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
  $('#siblh_mantenimientobundle_blhcrematocrito_crema1').on('input', function() {
    
   $crema1 = parseInt(this.value);
   
    
   
});

   $('#siblh_mantenimientobundle_blhcrematocrito_crema2').on('input', function() {
    
     $crema2 = parseInt(this.value);
    
   
});
   $('#siblh_mantenimientobundle_blhcrematocrito_crema3').on('input', function() {
    
   $crema3 = parseInt(this.value);
   $mediaCrema= ($crema1 + $crema2 + $crema3)/3;

});

    
$('#siblh_mantenimientobundle_blhcrematocrito_mediaCrema').on ('click', function() {
 
//Redondeando el resultado a 2 decimales 
$mediaCrema = Math.round($mediaCrema* 100) / 100;
 
 
this.value = $mediaCrema; } ); 


//COLIFORMES

$('#siblh_mantenimientobundle_blhcrematocrito_ct1').on('input', function() {
    
 $ct1 = parseInt(this.value);

});
   $('#siblh_mantenimientobundle_blhcrematocrito_ct2').on('input', function() {
    
 $ct2 = parseInt(this.value);

});
   $('#siblh_mantenimientobundle_blhcrematocrito_ct3').on('input', function() {
    
 $ct3 = parseInt(this.value);
 
 $mediaCt= ($ct1 + $ct2 + $ct3)/3;

});

$('#siblh_mantenimientobundle_blhcrematocrito_mediaCt').on ('click', function() {
 
//Redondeando el resultado a 2 decimales 
$mediaCt = Math.round($mediaCt* 100) / 100;
 
 
this.value = $mediaCt; } ); 

$('#siblh_mantenimientobundle_blhcrematocrito_porcentajeCrema').on('click', function() {
    
$porcentajeCrema=$mediaCrema/($mediaCt*100);
//$porcentajeCrema= Math.round( $porcentajeCrema* 100) / 100;
this.value = $porcentajeCrema;

});

$('#siblh_mantenimientobundle_blhcrematocrito_kilocalorias').on ('click', function() {
 

$kilocalorias = ($porcentajeCrema*268)+290;
//Redondeando el resultado a 2 decimales 
$kilocalorias= Math.round( $kilocalorias* 100) / 100;
 
this.value = $kilocalorias; } ); 




});

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}