$(document).ready(function() { 
    
    $('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').keyup(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').change(function() {
            if ($('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').val()=='')
                {alert('Digite un valor valido para el volumen');}
            else
                {$('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').focus();}
}       );

    
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
    
/*  
    $('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').on('input', function() {
    
    $ml = this.value;
    $onz = $ml * 0.033814;
    $onz=$onz.toFixed(4);
 
   
});

 $('#siblh_mantenimientobundle_blhfrascorecolectado_onzRecolectado').on ('click', function() {
 
this.value = $onz; } )   */
   
   
      $('#button').button(); 
      $('#boton').button(); 
      
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
     
 $ml= $('#siblh_mantenimientobundle_blhfrascorecolectado_volumenRecolectado').val();

    if(valor !='')
     {if (($ml == '') || ($ml <1) || ($ml > 500) ) 
        { 
            alert ('Digite un valor valido para el volumen recolectado');
            return false;
        }
    else {
            
 
    $onz = $ml * 0.033814;
    $onz=$onz.toFixed(4);
           
            $('#siblh_mantenimientobundle_blhfrascorecolectado_onzRecolectado').val($onz); 
            return true;
        } 
     }
     else
         {return false;}
}
