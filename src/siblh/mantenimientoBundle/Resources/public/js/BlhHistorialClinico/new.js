$(document).ready(function() { 
  
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaUltimaRegla"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           defaultDate: null,
                           clearStatus: 'Borra fecha actual',  
                           minDate: '-2m',
                           maxDate: 'm',
                         // monthRange: '-2m:m',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                          
     $('input[id$="_fechaParto"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           defaultDate: 'today',
                           clearStatus: 'Borra fecha actual', 
                            //yearRange: '-y:today',
                           minDate: '-1y',
                           maxDate: 'y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });      
                          
    $('input[id$="_fechaPartoAnterior"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           defaultDate: null,
                           clearStatus: 'Borra fecha actual', 
                           yearRange: '-37y:y',
                           //minDate: '2012-10-08',
                           maxDate: '-7m',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });    
     $('#boton').button();  
     $('#boton1').button();  
                          
 //$('form').bValidator(optionsRed);
  $('#lugC').hide();
  $('#numC').hide();
                          
$('#siblh_mantenimientobundle_blhhistorialclinico_controlPrenatal').on('change', function() {
       
    switch( this.value ) {
        case 'No':
           $('#lugC').hide();
        //    $('#numC').hide();
 //  alert ("hola");
           
            break;
        case 'Si':
           $('#lugC').show();
        //   $('#numC').show();
            break;
        
    }   
    });          
    
   //Validaciones
         
$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaG').
            attr('data-bvalidator', 'between[1:15]'); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaG').   
    attr('data-bvalidator-msg', "El valor debe estar entre 1 y 15"); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP1').
            attr('data-bvalidator', 'between[0:15]'); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP1').   
    attr('data-bvalidator-msg', "El valor debe estar entre 0 y 15"); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP2').
            attr('data-bvalidator', 'between[0:15]'); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP2').   
    attr('data-bvalidator-msg', "El valor debe estar entre 0 y 15"); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaA').
            attr('data-bvalidator', 'between[0:15]'); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaA').   
    attr('data-bvalidator-msg', "El valor debe estar entre 0 y 15"); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaV').
            attr('data-bvalidator', 'between[0:15]'); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaV').   
    attr('data-bvalidator-msg', "El valor debe estar entre 0 y 15"); 
    
$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaM').
            attr('data-bvalidator', 'between[0:15]'); 
    
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaM').   
    attr('data-bvalidator-msg', "El valor debe estar entre 0 y 15"); 
  

$('#siblh_mantenimientobundle_blhhistorialclinico_numeroControl').
            attr('data-bvalidator', 'between[0:9]'); 
    
$('#siblh_mantenimientobundle_blhhistorialclinico_numeroControl').  
        attr('data-bvalidator-msg', "El valor debe estar entre 0 y 9"); 

  $('#siblh_mantenimientobundle_blhhistorialclinico_periodoIntergenesico').
            attr('data-bvalidator', 'between[1:20],required');    

  $('#siblh_mantenimientobundle_blhhistorialclinico_periodoIntergenesico').
      attr('data-bvalidator-msg', "El valor debe estar entre 1 y 20"); 

 /*   $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').
            attr('data-bvalidator', 'between[1:38]');    

$('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').
        attr('data-bvalidator-msg', "El valor debe estar entre 1 y 38"); */


    $('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').
            attr('data-bvalidator', 'required');  


 //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
          $('form').bValidator(optionsRed);
          
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




//validacion de formula obstetrica
/*$('#boton').on('click',function()
{


$g=$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaG').val();
$p1=$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP1').val();
$p2=$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP2').val();
$a=$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaA').val();
$v=$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaV').val();
$m=$('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaM').val();

$embarazos=parseInt($g); 
$partos=parseInt($p1); 
$prematuros=parseInt($p2); 
$abortos=parseInt($a); 
$vivos=parseInt($v); 
$muertos=parseInt($m); 

$np=$partos+$prematuros+$abortos;
if($embarazos != $np) 
{
alert ('Error en formula obstetrica: El numero de embarazos debes ser igual a la sumatoria de partos, partos prematuros y abortos.');
return false;
}    
});
*/
    
$('#boton').on ('click', function() {

$fregla=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').val();
$fparto=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').val();

$fregla = new Date($fregla);
$fparto = new Date($fparto);
      
  $resta =  ($fparto.getYear() * 12 + $fparto.getMonth()) - ($fregla.getYear() * 12 + $fregla.getMonth())
if ($resta > 10)
{
alert ('La diferencia entre fecha de parto y fecha de ultima regla no puede ser mayor a 10 meses');
return false;
}

});


$('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').on ('click', function() {
    
$fregla=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').val();
$fparto=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').val();
if (($fregla == '') || ($fparto == ''))
{

alert ('Debe digitar una fecha valida de parto y ultima regla');
return false;
}

else {

$fregla = new Date($fregla);
$fr = $fregla.getDate();
$fparto = new Date($fparto);
$fp = $fparto.getDate();


  
    $dd = $fregla.getDate();
    $mm = $fregla.getMonth() +1;
    $yyyy = $fregla.getFullYear();
if($dd<10){$dd='0'+$dd}
if($mm<10){$mm='0'+$mm}
$fr = $dd+'-'+$mm+'-'+$yyyy;

$dd1 = $fparto.getDate();
    $mm1 = $fparto.getMonth() +1;
    $yyyy1 = $fparto.getFullYear();
if($dd1<10){$dd1='0'+$dd1}
if($mm1<10){$mm1='0'+$mm1}
$fp = $dd1+'-'+$mm1+'-'+$yyyy1;


$fr = new Date(parseFloat($fr.substr(6,4)), parseFloat($fr.substr(3,2))-1, parseFloat($fr.substr(0,2)));
$fp = new Date(parseFloat($fp.substr(6,4)), parseFloat($fp.substr(3,2))-1, parseFloat($fp.substr(0,2)));

	$fin = $fp.getTime() - $fr.getTime();
	$dias = Math.floor($fin / (24 * 60 * 60 * 1000));  
        $dias = $dias/7;
        $dias=$dias.toFixed(4);

 this.value = $dias;
}

});

$('#boton').on ('click', function() {

$partoanterior=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaPartoAnterior').val();
$parto=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').val();

$partoanterior = new Date($partoanterior);
$parto = new Date($parto);
      
  $resta2 =  ($parto.getYear() * 12 + $parto.getMonth()) - ($partoanterior.getYear() * 12 + $partoanterior.getMonth())
if ($resta2 < 7)
{
alert ('La diferencia entre fecha de parto y fecha de parto anterior no puede ser menor a 7 meses');
return false;
}

});


$('#boton').on ('click', function() {
    alert ('hola');
    $f = $('#siblh_mantenimientobundle_blhhistorialclinico_fechaPartoAnterior').val();
    $f = new Date($f);
    $hoy = new Date();
    alert ($f);
    alert ($hoy);
    if ($f == $hoy)
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_fechaPartoAnterior').value = null;
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


