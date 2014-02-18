$(document).ready(function() { 
  
      
 $('#siblh_mantenimientobundle_blhacidez_acidez1').keyup(function() {
            if (calcular($(this).val()))
                {calcular1();}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhacidez_acidez1').change(function() {
            if ($('#siblh_mantenimientobundle_blhacidez_acidez1').val()=='')
                {alert('Digite un valor valido para la acidez 1');}
            else
                {$('#siblh_mantenimientobundle_blhacidez_acidez1').focus();}
}       );


   $('#siblh_mantenimientobundle_blhacidez_acidez2').keyup(function() {
            if (calcular($(this).val()))
                {calcular1();}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhacidez_acidez2').change(function() {
            if ($('#siblh_mantenimientobundle_blhacidez_acidez2').val()=='')
                {alert('Digite un valor valido para la acidez 2');}
            else
                {$('#siblh_mantenimientobundle_blhacidez_acidez2').focus();}
}       );


 $('#siblh_mantenimientobundle_blhacidez_acidez3').keyup(function() {
            if (calcular($(this).val()))
                {calcular1();}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhacidez_acidez3').change(function() {
            if ($('#siblh_mantenimientobundle_blhacidez_acidez3').val()=='')
                {alert('Digite un valor valido para la acidez 3');}
            else
                {$('#siblh_mantenimientobundle_blhacidez_acidez3').focus();}
}       );


  
  $('#siblh_mantenimientobundle_blhacidez_factor').blur(function() {
            if (calcular1($(this).val()))
                {}
            else
                {$(this).focus();}
}       );


  $('#siblh_mantenimientobundle_blhacidez_factor').keyup(function() {
            if ($(this).val() !='' || $(this).val() !='0.' || $(this).val() !='0')
                {calcular1($(this).val());}
            else
                {$(this).focus();}
}       );




 
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
    

  
 $('#siblh_mantenimientobundle_blhacidez_acidez1').
            attr('data-bvalidator', 'required,between[1:15]');

  $('#siblh_mantenimientobundle_blhacidez_acidez2').
            attr('data-bvalidator', 'required,between[1:15]');
    
 $('#siblh_mantenimientobundle_blhacidez_acidez3').
            attr('data-bvalidator', 'required,between[1:15]');
  
  
 
 $('#siblh_mantenimientobundle_blhacidez_factor').
            attr('data-bvalidator', 'required');
  
 
                          


/*   $('#siblh_mantenimientobundle_blhacidez_factor').on('input', function() {
    
 $factor = this.value;

}); */

 
 
 
$('#boton').on ('click', function() {

$acidez=$('#siblh_mantenimientobundle_blhacidez_resultado').val();

if($acidez>8){
    alert('Frasco descartado, acidez dornic mayor a 8');
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


 

/////////funcion para valores calculados//////

function calcular(valor)
{
    $Acidez1 = $('#siblh_mantenimientobundle_blhacidez_acidez1').val();
    $Acidez2 = $('#siblh_mantenimientobundle_blhacidez_acidez2').val();
    $Acidez3 = $('#siblh_mantenimientobundle_blhacidez_acidez3').val();
    if(valor !='')
     { 
    if (($Acidez1 == '') || ($Acidez2 == '') || ($Acidez3 == '') || ($Acidez1 < 1) || ($Acidez1 > 15) || ($Acidez2 < 1) || ($Acidez2 > 15)  || ($Acidez3 < 1) || ($Acidez3 > 15) ) 
{ alert ('Verifique que los valores para la acidez sean validos');
    return false;}
    else {
            
 $mediaAcidez= (parseInt($Acidez1) + parseInt($Acidez2) + parseInt($Acidez3))/3;
//Redondeando el resultado a 2 decimales 
$mediaAcidez = $mediaAcidez.toFixed(2);

           
            $('#siblh_mantenimientobundle_blhacidez_mediaAcidez').val($mediaAcidez); 
            return true;
        } 
     }
     else
         {return false;}
} 
 
 
 
 
function calcular1(valor)
{
 $factor = $('#siblh_mantenimientobundle_blhacidez_factor').val();
 
 $mediaAcidez = $('#siblh_mantenimientobundle_blhacidez_mediaAcidez').val();
    if(valor !='')
     { 
   if ( ($factor > 1.1) ) 
{ 
    
    $('#siblh_mantenimientobundle_blhacidez_factor').val('');
    $('#siblh_mantenimientobundle_blhacidez_factor').focusin();
    $('#siblh_mantenimientobundle_blhacidez_factor').focus();
    alert ('Verifique que el valor del facotor sea correcto');
    return false;}
    else {
 $factor = $('#siblh_mantenimientobundle_blhacidez_factor').val();  
 if ( ($factor < 0.9) && ($factor < 1.1) && ($factor!='') && ($factor!='0')&& ($factor!='0.')) 
{ 
    
    $('#siblh_mantenimientobundle_blhacidez_factor').val('');
    $('#siblh_mantenimientobundle_blhacidez_factor').focusin();
    $('#siblh_mantenimientobundle_blhacidez_factor').focus();
    alert ('Verifique que el valor del facotor sea correcto');
    return false;}
$resultado = parseFloat($mediaAcidez) * $factor;
//Redondeando el resultado a 2 decimales
$resultado = $resultado.toFixed(2);
           
            $('#siblh_mantenimientobundle_blhacidez_resultado').val($resultado); 
            if (isNaN($resultado))
            {
                $('#siblh_mantenimientobundle_blhacidez_factor').focusin();
    $('#siblh_mantenimientobundle_blhacidez_factor').focus();
                 $('#siblh_mantenimientobundle_blhacidez_factor').val('');
            }
            return true;
        } 
     }
     else
         {return false;}
} 
