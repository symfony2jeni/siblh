$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
     var semana = Number($('#sem').val().trim());
     semana = semana === 0 ? 1 : semana;  
     $('#siblh_mantenimientobundle_blhseguimientoreceptor_semana').val( semana );
     
       //Calendario  
     $('input[id$="_fechaSeguimiento"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '2012-10-08',
                           maxDate: 'today',
                           yearRange: '2012:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });  
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
     $('#boton1')
      .button();
     
  
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_fechaSeguimiento').
            attr('data-bvalidator', 'required');

  $('#siblh_mantenimientobundle_blhseguimientoreceptor_semana').attr('data-bvalidator', 'required,between[1:16]');
    
     $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').attr('data-bvalidator', 'required,between[5:10]');


    
     
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').
            attr('data-bvalidator', 'required,between[20:40]');
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').
      attr('data-bvalidator', 'required,between[-5:5]');
    
    

    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').
            attr('data-bvalidator', 'required,between[500:5000]');
  
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').
            attr('data-bvalidator', 'required,between[-50:50]');
 
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').
            attr('data-bvalidator', 'required,between[25:55]');
    
    
  $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').
            attr('data-bvalidator', 'required,between[-5:5]');
    

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);

$sem = $('#siblh_mantenimientobundle_blhseguimientoreceptor_semana').val();
$tallaseg = $('#tallaseg').val();
$pesoseg = $('#pesoseg').val();
$pcseg = $('#pcseg').val();
$tallain = $('#tallain').val();
$pesoin = $('#pesoin').val();
$pcin = $('#pcin').val();
$('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').on ('click', function() {
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$pc = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val();

if ($sem > 1)
    {
       // $pc = typeof $pc.float;
    
        $gananciapc = ($pc - $pcseg) / $dias;
        $gananciapc=$gananciapc.toFixed(4);
        this.value = $gananciapc;
    }
else
   {
        $gananciapc = ($pc - $pcin) / $dias;
        $gananciapc=$gananciapc.toFixed(4);
        this.value = $gananciapc;
    }    
    

});


$('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').on ('click', function() {
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$peso = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val();

if ($sem > 1)
    {
       // $pc = typeof $pc.float;
    
        $gananciapeso = ($peso - $pesoseg) / $dias;
        $gananciapeso=$gananciapeso.toFixed(4);
        this.value = $gananciapeso;
    }
else
   {
        $gananciapeso = ($peso - $pesoin) / $dias;
        $gananciapeso=$gananciapeso.toFixed(4);
        this.value = $gananciapeso;
    }    
    

});


$('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').on ('click', function() {
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$talla = $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').val();

if ($sem > 1)
    {
       // $pc = typeof $pc.float;
    
        $gananciatalla = ($talla - $tallaseg) / $dias;
        $gananciatalla=$gananciatalla.toFixed(4);
        this.value = $gananciatalla;
    }
else
   {
        $gananciatalla = ($talla - $tallain) / $dias;
        $gananciatalla=$gananciatalla.toFixed(4);
        this.value = $gananciatalla;
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
if ((keynum === 8) || (keynum === 46) || (keynum === 45))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}

function IsNumeric (o) {
    return typeof o === 'number' && isFinite(o);
}
      
