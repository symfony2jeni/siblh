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



  $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').
            attr('data-bvalidator', 'required');

  $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').
            attr('data-bvalidator', 'required');
    
      $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').
            attr('data-bvalidator', 'required');
    
 //Cambios Henry   
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').keyup(function(){
        var valor = $(this).val();
        if ( valor < 5 || valor > 10 )
        {
            if (valor != 1 && valor!=='')
            {
                $(this).focusin();
                $(this).val('');
                limpiarCampos();
                alert('Digite un valor entre 5 y 10 para el campo periodo');
                return false;
            }
        }
    });
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').blur(function(){
        var valor = $(this).val();
        if (valor==1)
        {
                $(this).focusin();
                $(this).val('');
                alert('Digite un valor entre 5 y 10 para el campo perimetro');
                return false;            
        }
        else if(valor==='')
        {
            limpiarCampos();
        }
        
    });
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').keyup(function(){
        //alert ('Henry');
        var valor = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
        var valorPcSeguimineto = $(this).val();
        //alert (valor);
        if (valor <5 || valor >10)
        {       $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').focus();
               
                alert('Digite un valor entre 5 y 10 para el campo periodo');
                return false;
        }
        else
        {  
            if(valorPcSeguimineto < 20 || valorPcSeguimineto > 40)
            {
                if (valorPcSeguimineto != 2 && valorPcSeguimineto != 3 && valorPcSeguimineto != 4 && valorPcSeguimineto !=='')
                {
                    
                    $(this).val('');
                   
                   
                    alert('Digite un valor entre 20 y 40 para el campo perimetro');
                     $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').focusin();
                    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').val('');
                    return false;            

                }
            }
            else
            {
                if(valorPcSeguimineto !== '')
                {
                    
                    $dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
                    $pc = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val();
                    $pcseg = $('#pcseg').val();
                    $gananciapc = ($pc - $pcseg) / $dias;
                    $gananciapc=$gananciapc.toFixed(4);
                    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').val($gananciapc);                    
                                       
                }
                else
                {
                    return false;
                }
            }
        }
        
    });
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').blur(function(){
        var valor = $(this).val();
        //alert(valor);
        if ((valor== 2 || valor== 3 || valor== 4)&& valor!=='')
        {
                 $(this).val('');
                $('#pagina').blur();
               
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').focusin();
                
                alert('Digite un valor entre 20 y 40 para el campo perimetro');

                  
                
        }
        else if(valor==='')
        {    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').focus();
             return false;
        }
        
    });   
 
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').keyup(function(){
        //alert ('Henry');
        var valor = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
        var valorTallaReceptor = $(this).val();
        //alert (valor);
        if (valor <5 || valor >10)
        {       $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').focus();
               
                alert('Digite un valor entre 5 y 10 para el campo periodo');
                return false;
        }
        else
        {  
            if(valorTallaReceptor < 25 || valorTallaReceptor > 55)
            {
                if (valorTallaReceptor != 2 && valorTallaReceptor != 3 && valorTallaReceptor != 4 && valorTallaReceptor != 5 && valorTallaReceptor !=='')
                {
                    alert('Digite un valor entre 25 y 55 para el campo talla');
                    $(this).focusin();
                    $(this).val('');
                    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').val('');
                    //alert('Digite un valor entre 25 y 55 para el campo talla');
                    return false;            

                }
            }
            else
            {
                if(valorTallaReceptor !== '')
                {
                    
                    $dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
                    $talla = $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').val();
                    $tallaseg = $('#tallaseg').val();
               	    $gananciatalla = ($talla - $tallaseg) / $dias;
		    $gananciatalla=$gananciatalla.toFixed(4);
		    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').val($gananciatalla); 
		                  
                                       
                }
                else
                {
                    return false;
                }
            }
        }
        
    });
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').blur(function(){
        var valor = $(this).val();
        //alert(valor);
        if ((valor== 2 || valor== 3 || valor== 4 || valor== 5)&& valor!=='')
        {
                 $(this).val('');
                $('#pagina').blur();
               
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').focusin();
                
                alert('Digite un valor entre 25 y 55 para el campo perimetro');

                  
                
        }
        else if(valor==='')
        {    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').focus();
             return false;
        }
        
    });
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').keyup(function(){
        //alert ('Henry');
        var valor = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
        var valorpesoSeguimiento = $(this).val();
        //alert (valor);
        if (valor <5 || valor >10)
        {       $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').focus();
               
                alert('Digite un valor entre 5 y 10 para el campo periodo');
                return false;
        }
        else
        {  
           
            
                if(valorpesoSeguimiento !== '')
                {
		    if( valorpesoSeguimiento!=0)
                    {
                    $dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
                    $peso = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val();
                    $pesoseg = $('#pesoseg').val();
		    $gananciapeso = ($peso - $pesoseg) / $dias;
        	    $gananciapeso=$gananciapeso.toFixed(4);
		    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').val($gananciapeso); 
		    }
		    else
		    {
			$peso = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val('');
			 $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').val('');
		    }              
                                       
                }
                else
                {
                    return false;
                }
            
        }
        
    });
    
    $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').blur(function(){
        var valor = $(this).val();
        //alert(valor);
        if ((valor <500 || valor > 5000) && valor!=='')
        {
                 $(this).val('');
                $('#pagina').blur();
               
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').focusin();
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').focus();
                alert('Digite un valor entre 500 y 5000 para el campo peso');

                  
                
        }
        else if(valor==='')
        {    $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val('');
             $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').focus();
             return false;
        }
        
    });

    
});
function limpiarCampos(){
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val('');
                $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').val('');   
}
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
      
