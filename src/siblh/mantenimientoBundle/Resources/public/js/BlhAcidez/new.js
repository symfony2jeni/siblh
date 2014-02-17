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
    
    //spinner
    $( "#spinner" ).spinner({
      spin: function( event, ui ) {
        if ( ui.value > 10 ) {
          $( this ).spinner( "value", -10 );
          return false;
        } else if ( ui.value < -10 ) {
          $( this ).spinner( "value", 10 );
          return false;
        }
      }
    });
    

  
       
    //Boton   
    
    $('#boton')
      .button();
       $('#boton1')
      .button();
      
   

 
  

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    
$('#siblh_mantenimientobundle_blhacidez_acidez1').blur(function(){
   $x= mediaAcidez();
   if ($x==0) {this.focus(); return false;}
});

$('#siblh_mantenimientobundle_blhacidez_acidez2').blur(function(){
   $x= mediaAcidez();
   if ($x==0) {this.focus(); return false;}
});
  
$('#siblh_mantenimientobundle_blhacidez_acidez3').blur(function(){
    $x= mediaAcidez();
   if ($x==0) {this.focus(); return false;}
});

$('#siblh_mantenimientobundle_blhacidez_factor').blur(function(){
$x= factorr();
   if ($x==0) {this.focus(); return false;}
});
 $('#siblh_mantenimientobundle_blhacidez_acidez1').
            attr('data-bvalidator', 'required,between[1:15]');

  $('#siblh_mantenimientobundle_blhacidez_acidez2').
            attr('data-bvalidator', 'required,between[1:15]');
    
 $('#siblh_mantenimientobundle_blhacidez_acidez3').
            attr('data-bvalidator', 'required,between[1:15]');
  
  
 
 $('#siblh_mantenimientobundle_blhacidez_factor').
            attr('data-bvalidator', 'required,between[0.9:1.1]');
  
 
                          


//Calculando campos                        

var $Acidez1; 
var $Acidez2; 
var $Acidez3; 
var $mediaAcidez;
var $factor;
var $resultado;

/*  $('#siblh_mantenimientobundle_blhacidez_acidez1').on('input', function() {
    
   $Acidez1 = this.value;
   
    
   
});

   $('#siblh_mantenimientobundle_blhacidez_acidez2').on('input', function() {
    
     $Acidez2 = parseInt(this.value);
    
   
});
   $('#siblh_mantenimientobundle_blhacidez_acidez3').on('input', function() {
    
   $Acidez3 = parseInt(this.value);


}); */

    
function mediaAcidez() {
   
    
    $Acidez1 = ($('#siblh_mantenimientobundle_blhacidez_acidez1').val()=='')?1:$('#siblh_mantenimientobundle_blhacidez_acidez1').val();
    $Acidez2 = ($('#siblh_mantenimientobundle_blhacidez_acidez2').val()=='')?1:$('#siblh_mantenimientobundle_blhacidez_acidez2').val();
    $Acidez3 = ($('#siblh_mantenimientobundle_blhacidez_acidez3').val()=='')?1:$('#siblh_mantenimientobundle_blhacidez_acidez3').val();
    
    if (($Acidez1 == '') || ($Acidez2 == '') || ($Acidez3 == '') || ($Acidez1 < 1) || ($Acidez1 > 15) || ($Acidez2 < 1) || ($Acidez2 > 15)  || ($Acidez3 < 1) || ($Acidez3 > 15) ) 
{ 
    alert ('Digite valores validos para la acidez');
    return 0;
}
else {
    $Acidez1 = ($('#siblh_mantenimientobundle_blhacidez_acidez1').val()=='')?'a1':$('#siblh_mantenimientobundle_blhacidez_acidez1').val();
    $Acidez2 = ($('#siblh_mantenimientobundle_blhacidez_acidez2').val()=='')?'a2':$('#siblh_mantenimientobundle_blhacidez_acidez2').val();
    $Acidez3 = ($('#siblh_mantenimientobundle_blhacidez_acidez3').val()=='')?'a3':$('#siblh_mantenimientobundle_blhacidez_acidez3').val();
    
    if ($Acidez1 == 'a1')
    {
        $Acidez1=0;
    }
   
   if ($Acidez2 == 'a2')
    {
        $Acidez2=0;
    }
   
   if ($Acidez3 == 'a3')
    {
        $Acidez3=0;
    }
   
   
   $mediaAcidez= (parseInt($Acidez1) + parseInt($Acidez2) + parseInt($Acidez3))/3;
//Redondeando el resultado a 2 decimales 
$mediaAcidez = Math.round( $mediaAcidez* 100) / 100;
 
 
$('#siblh_mantenimientobundle_blhacidez_mediaAcidez').val($mediaAcidez);  

return 1;
}
 ; }  

/*   $('#siblh_mantenimientobundle_blhacidez_factor').on('input', function() {
    
 $factor = this.value;

}); */

function factorr() {
 
 $factor = $('#siblh_mantenimientobundle_blhacidez_factor').val();
 $mediaAcidez = $('#siblh_mantenimientobundle_blhacidez_mediaAcidez').val();
 
 if (($mediaAcidez == '') || ($factor > 1.1) || ($factor < 0.9) ) 
 
{ alert ('Verifique que el valor del factor y la media acidez sean correctas');
    $('#siblh_mantenimientobundle_blhacidez_factor').val('');
    return 0;}
else {
 $factor = ($('#siblh_mantenimientobundle_blhacidez_factor').val()=='0')?'':$('#siblh_mantenimientobundle_blhacidez_factor').val();
 
 
$resultado = $mediaAcidez*$factor;
//Redondeando el resultado a 2 decimales 
$resultado = Math.round( $resultado* 100) / 100;
 
$('#siblh_mantenimientobundle_blhacidez_resultado').val($resultado); 


if (isNaN($resultado))
 {
     $('#siblh_mantenimientobundle_blhacidez_factor').val('');
     alert ('Verifique que el valor del facotor y la media acidez sean correctas');
     
    return false;
 }

}
} ; 




$('#boton').on ('click', function() {

$acidez=$('#siblh_mantenimientobundle_blhacidez_resultado').val();

if($acidez>8){
    alert('Frasco descartado, acidez dornic mayor a 8');
}

});
     
   $('#siblh_mantenimientobundle_blhacidez_mediaAcidez').
            attr('data-bvalidator', 'required');
    
   $('#siblh_mantenimientobundle_blhacidez_resultado').
            attr('data-bvalidator', 'required');

    
       $('#siblh_mantenimientobundle_blhacidez_factor').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhacidez_factor').val();
     $valor = parseFloat($valor);  
   //  alert(typeof $valor);
    if (($valor < 0.9) ||  ($valor > 1.1))
      {
          alert ("El valor del factor debe estar entre 0.9 y 1.1");
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
if ((keynum === 8) || (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}


 
 
 
