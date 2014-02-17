$(document).ready(function() { 
    
 $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').keyup(function() {
            if ((calcular($(this).val())) && (calcular1($(this).val())) && (calcular2($(this).val())))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').change(function() {
            if ($('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val()=='')
                {alert('Digite un valor valido para el periodo de evaluacion');}
            else
                {$('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').focus();}
}       );


   
$('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').blur(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').change(function() {
            if ($('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val()=='')
                {alert('Digite un valor valido para el perimetro cefalico');}
            else
                {$('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').focus();}
}       );


   
$('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').blur(function() {
            if (calcular1($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').change(function() {
            if ($('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val()=='')
                {alert('Digite un valor valido para el peso del receptor');}
            else
                {$('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').focus();}
}       );


  
$('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').blur(function() {
            if (calcular2($(this).val()))
                {}
            else
                {$(this).focus();}
}       );





$('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').change(function() {
            if ($('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').val()=='')
                {alert('Digite un valor valido para la talla del receptor');}
            else
                {$('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').focus();}
}       );




     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
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


 /*   
     
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
            attr('data-bvalidator', 'required,between[-5:5]'); */
    

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    
    


/*
$('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').on ('click', function() {
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$pc = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val();

if (($pc == '') || ($dias == '') || ($pc<20) || ($pc>40)){alert ('Verificar que Periodo de seguimiento y Perimetro cefalico esten ingresados correctamente');
    return false;}

else {
    
        $gananciapc = ($pc - $pcseg) / $dias;
        $gananciapc=$gananciapc.toFixed(4);
        this.value = $gananciapc;
  
}
}); */




    


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


      
      
      

/////////funcion para valores calculados//////

function calcular(valor)
{
     
$pcseg = $('#pcseg').val();
     
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$pc = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pcSeguimiento').val();     
 
    if(valor !='')
     {if (($pc == '') || ($dias == '') || ($pc<20) || ($pc>40) || ($dias<5) || ($dias>10))
         {alert ('Verificar que Periodo de seguimiento y Perimetro cefalico esten ingresados correctamente');
    return false;}
    else {
            
  $gananciapc = ($pc - $pcseg) / $dias;
  $gananciapc=$gananciapc.toFixed(4);
           
            $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPc').val($gananciapc); 
            return true;
        } 
     }
     else
         {return false;}
}


function calcular1(valor)
{
     
$pesoseg = $('#pesoseg').val();
     
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$peso = $('#siblh_mantenimientobundle_blhseguimientoreceptor_pesoSeguimiento').val();   
 
    if(valor !='')
     {if (($peso == '') || ($dias == '') || ($peso<500) || ($peso>5000) || ($dias<5) || ($dias>10)){
             alert ('Verificar que Periodo de seguimiento y Peso esten ingresados correctamente');
    return false;}
    else {
            
   $gananciapeso = ($peso - $pesoseg) / $dias;
        $gananciapeso=$gananciapeso.toFixed(4);
           
            $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaPeso').val($gananciapeso); 
            return true;
        } 
     }
     else
         {return false;}
}



function calcular2(valor)
{
     
$tallaseg = $('#tallaseg').val();
     
$dias = $('#siblh_mantenimientobundle_blhseguimientoreceptor_periodoEvaluacion').val();
$talla = $('#siblh_mantenimientobundle_blhseguimientoreceptor_tallaReceptor').val();  
 
    if(valor !='')
     {if (($talla == '') || ($dias == '') || ($talla<25) || ($talla>55) || ($dias<5) || ($dias>10)){
    alert ('Verificar que Periodo de seguimiento y Talla esten ingresados correctamente');
    return false;}

    else {
            
 $gananciatalla = ($talla - $tallaseg) / $dias;
        $gananciatalla=$gananciatalla.toFixed(4);
           
            $('#siblh_mantenimientobundle_blhseguimientoreceptor_gananciaDiaTalla').val($gananciatalla); 
            return true;
        } 
     }
     else
         {return false;}
}





