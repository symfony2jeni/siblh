$(document).ready(function() { 

    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
    $('form').bValidator(optionsRed);
    
   
    
  $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaRegistroBlh"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                          // minDate: '2010-01-01',
                           maxDate: 'today',
                        //yearRange: '-35y:-13y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                             
   
$('#button').on('click', function() {
    
    $val=$('#siblh_mantenimientobundle_blhreceptor_clasificacionLubchengo').val();
    if($val === '')
        {alert('Seleccione la Clasificacion Lubechengo');
        return false;}
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
        attr('data-bvalidator', 'between[24:42],required');
    
$('#siblh_mantenimientobundle_blhreceptor_edadGestFur').
        attr('data-bvalidator-msg', "Ingrese la edad en semanas de 24 a 42 semananas");  

$('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').
        attr('data-bvalidator', 'between[500:5000],required');
    
$('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').
        attr('data-bvalidator-msg', "Ingrese el peso entre 400 y 2500 gramos"); 

$('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').
        attr('data-bvalidator', 'between[25:55],required');
    
$('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').
        attr('data-bvalidator-msg', "Ingrese la talla entre 25 y 55 cm"); 

$('#siblh_mantenimientobundle_blhreceptor_pc').
        attr('data-bvalidator', 'between[20:40],required');
    
$('#siblh_mantenimientobundle_blhreceptor_pc').
        attr('data-bvalidator-msg', "Ingrese la talla entre 20 y 40 cm"); 

    

$('#siblh_mantenimientobundle_blhreceptor_apgarPrimerMinuto').attr('data-bvalidator', 'required,between[0:9]');
    
$('#siblh_mantenimientobundle_blhreceptor_apgarQuintoMinuto').attr('data-bvalidator', 'required,between[0:10]');


$('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').
        attr('data-bvalidator', 'between[20:42],required');
    
$('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').
        attr('data-bvalidator-msg', "Ingrese la edad en semanas de 20 a 42 semananas"); 


$('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').
        attr('data-bvalidator', 'between[0:99],required');

$('#siblh_mantenimientobundle_blhreceptor_duracionCpap').
        attr('data-bvalidator', 'between[0:50],required');

$('#siblh_mantenimientobundle_blhreceptor_duracionNpt').
        attr('data-bvalidator', 'between[0:50],required');

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
    $('#button').button();
    $('#boton1').button();
    
      $('#siblh_mantenimientobundle_blhreceptor_edadDias').
            attr('data-bvalidator', 'required');
    calcularEdadDias();
    
       $('#siblh_mantenimientobundle_blhreceptor_edadGestFur').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_edadGestFur').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 24) ||  ($valor > 42))
      {
          alert ("La edad gestacional FUR debe estar entre 24 y 42 semanas");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 25) ||  ($valor > 55))
      {
          alert ("El peso debe estar entre 25 y 55 cm");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').val();
     $valor = parseFloat($valor);  
   //  alert(typeof $valor);
    if (($valor < 500) ||  ($valor > 5000))
      {
          alert ("El peso debe estar entre 500 y 5000 gramos");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_pc').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_pc').val();
     $valor = parseFloat($valor);  
   //  alert(typeof $valor);
    if (($valor < 20) ||  ($valor > 40))
      {
          alert ("El perimetro cefalico debe estar entre 20 y 40");
          $(this).focus();
          return false;
      }
}); 
       $('#siblh_mantenimientobundle_blhreceptor_apgarPrimerMinuto').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_apgarPrimerMinuto').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 0) ||  ($valor > 9))
      {
          alert ("El valor de apgar al primer minuto debe estar entre 0 y 9");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_apgarQuintoMinuto').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_apgarQuintoMinuto').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 0) ||  ($valor > 10))
      {
          alert ("El valor de apgar al quinto minuto debe estar entre 0 y 10");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 20) ||  ($valor > 42))
      {
          alert ("La edad gestacional Ballard debe estar entre 20 y 42 semanas");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 0) ||  ($valor > 99))
      {
          alert ("El valor de ventilacion mecanica debe estar entre 0 y 99 dias");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_duracionCpap').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_duracionCpap').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 0) ||  ($valor > 50))
      {
          alert ("El valor de duracion CPAP debe estar entre 0 y 50 dias");
          $(this).focus();
          return false;
      }
}); 

       $('#siblh_mantenimientobundle_blhreceptor_duracionNpt').blur(function(){
     $valor= $('#siblh_mantenimientobundle_blhreceptor_duracionNpt').val();
     $valor = parseInt($valor);  
   //  alert(typeof $valor);
    if (($valor < 0) ||  ($valor > 50))
      {
          alert ("El valor de nutricion parenteral debe estar entre 0 y 50");
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

function calcularEdadDias()
{
    
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
	$dias = Math.floor($fin / (24 * 60 * 60 * 1000));  



//////////////////
 $('#siblh_mantenimientobundle_blhreceptor_edadDias').val($dias);   
 
    
}
