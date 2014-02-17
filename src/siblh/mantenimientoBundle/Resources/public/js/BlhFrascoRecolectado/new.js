$(document).ready(function() { 

   $('button').button();
   $('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').
        attr('data-bvalidator', 'between[1:500],required');
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
   
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    
    
  

$('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').blur(function(){
    if ((this.value >= 1) && (this.value <= 500)) {
    $ml = this.value;
    $onz = $ml * 0.033814;
    $onz=$onz.toFixed(4);

    $('#siblh_mantenimientobundle_blhfrascorecolectado_onzRecolectado').val($onz); }
else {alert ("Digite el volumen entre 1 y 500 ml");}

   
});


 $('#button').button();
 $('#boton1').button();
 
 $('#button').on('click',function() {
     
 if($('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').val() < 30) {
     
     alert ("Frasco descartada por muestra insuficiente");
 }    
     
 });
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

          $('#siblh_mantenimientobundle_blhfrascorecolectado_onzRecolectado').
            attr('data-bvalidator', 'required'); 
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

