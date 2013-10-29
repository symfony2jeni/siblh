$(document).ready(function() { 
   $('button').button();
   
 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    
   
$('#siblh_mantenimientobundle_blhreceptor_edadDias').on ('click', function() {
 //$edad = 2;
 $fn = $('#1').val();
    $d = new Date();
    $hoy = $d.getDate();
    
    
    $dd = $d.getDate();
    $mm = $d.getMonth() +1;
    $yyyy = $d.getFullYear();
if($dd<10){$dd='0'+$dd}
if($mm<10){$mm='0'+$mm}
$hoy = $dd+'-'+$mm+'-'+$yyyy;
  //  $edad = $hoy.getTime() - $fn.getTime();

 
 
//probando//
$hoy = new Date(parseFloat($hoy.substr(6,4)), parseFloat($hoy.substr(3,2))-1, parseFloat($hoy.substr(0,2)));
$fn = new Date(parseFloat($fn.substr(6,4)), parseFloat($fn.substr(3,2))-1, parseFloat($fn.substr(0,2)));
//$fn = new Date(2013,10-1,20);	
	//$fn = new Date($fn[2], parseFloat($fn[2])-1, parseFloat($fn[0]));
 
	$fin = $hoy.getTime() - $fn.getTime();
	$dias = Math.floor($fin / (24 * 60 * 60 * 1000))  



//////////////////
 this.value = $dias;   
 

} ) ;
    
  $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaRegistroBlh"]').datepicker({ dateFormat: 'yy-MM-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '2012-10-08',
                           maxDate: 'today',
                         // yearRange: ':-13y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                             
   

$('#2').on ('click', function() {
    
   $valor = this.value;
  // alert ($valor);
   
 $('#siblh_mantenimientobundle_blhreceptor_clasificacionLubchengo').val (this.value); 
    
});

$('#3').on ('click', function() {
    
   $valor = this.value;
  // alert ($valor);
    
 $('#siblh_mantenimientobundle_blhreceptor_clasificacionLubchengo').val (this.value); 
    
});


$('#4').on ('click', function() {
    
   $valor = this.value;
 //  alert ($valor);
    
 $('#siblh_mantenimientobundle_blhreceptor_clasificacionLubchengo').val (this.value); 
    
});

$('#siblh_mantenimientobundle_blhreceptor_edadGestFur').
        attr('data-bvalidator', 'between[0:52],required');
    
$('#siblh_mantenimientobundle_blhreceptor_edadGestFur').
        attr('data-bvalidator-msg', "Ingrese la edad en semanas de 0 a 52 semananas");  

$('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').
        attr('data-bvalidator', 'between[400:2500],required');
    
$('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').
        attr('data-bvalidator-msg', "Ingrese el peso entre 400 y 2500 gramos"); 

$('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').
        attr('data-bvalidator', 'between[30:60],required');
    
$('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').
        attr('data-bvalidator-msg', "Ingrese la talla entre 30 y 60 cm"); 

$('#siblh_mantenimientobundle_blhreceptor_pc').
        attr('data-bvalidator', 'between[30:60],required');
    
$('#siblh_mantenimientobundle_blhreceptor_pc').
        attr('data-bvalidator-msg', "Ingrese la talla entre 30 y 60 cm"); 

$('#siblh_mantenimientobundle_blhreceptor_apgar').
        attr('data-bvalidator', 'between[30:60],required');
    
$('#siblh_mantenimientobundle_blhreceptor_apgar').
        attr('data-bvalidator-msg', "Ingrese el valor apgar entre 30 y 60"); 


$('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').
        attr('data-bvalidator', 'between[0:52],required');
    
$('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').
        attr('data-bvalidator-msg', "Ingrese la edad en semanas de 0 a 52 semananas"); 


$('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').
        attr('data-bvalidator', 'between[0:52],required');

$('#siblh_mantenimientobundle_blhreceptor_duracionCpap').
        attr('data-bvalidator', 'between[0:52],required');

$('#siblh_mantenimientobundle_blhreceptor_duracionNpt').
        attr('data-bvalidator', 'between[0:52],required');
    
    
});