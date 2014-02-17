$(document).ready(function() { 
    
    //Inicio de modificacion de rox
    
    //Edad Furor
     
$('#siblh_mantenimientobundle_blhreceptor_edadGestFur').change(function() {
            if (($(this).val()< 24 || $(this).val()> 42) || $(this).val()=='')
                {alert('Digite un valor valido para edad Fur');
                $('#siblh_mantenimientobundle_blhreceptor_edadGestFur').val('');}
                
            else
                {$('#siblh_mantenimientobundle_blhreceptor_edadGestFur').focus();}
} );
     
     // Edad Ballard
$('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').change(function() {
            if (($(this).val()< 20 || $(this).val()> 42) || $(this).val()=='')
                {alert('Digite un valor valido para edad Ballard');
                $('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').val('');}
                
            else
                {$('#siblh_mantenimientobundle_blhreceptor_edadGestBallard').focus();}
} );

     //Duracion Ventilacion
     
      $('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 99) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').val('');
            alert('El valor de ventilacion mecanica debe estar entre 0 y 99');
         }
            else
                {$(this).focus();}
     } );
     
     
     //Duracion cpap
       $('#siblh_mantenimientobundle_blhreceptor_duracionCpap').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 50) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhreceptor_duracionCpap').val('');
            alert('El valor de Cpap debe estar enre 0 y 50');
         }
            else
                {$(this).focus();}
     } );
     
      //Duracion npt
       $('#siblh_mantenimientobundle_blhreceptor_duracionNpt').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 50) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhreceptor_duracionNpt').val('');
            alert('El valor de nutricion parenteral debe estar entre 0 y 50');
         }
            else
                {$(this).focus();}
     } );
     
    // apgarPrimerMinuto
      $('#siblh_mantenimientobundle_blhreceptor_apgarPrimerMinuto').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()>9) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhreceptor_apgarPrimerMinuto').val('');
            alert('El valor de APGAR al primer minuto debe estar entre 0 y 9');
         }
            else
                {$(this).focus();}
     } );
     
     //apgarQuintoMinuto
     
       $('#siblh_mantenimientobundle_blhreceptor_apgarQuintoMinuto').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 10) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhreceptor_apgarQuintoMinuto').val('');
            alert('el valor de APGAR al quinto minuto debe estar entre 0 y 10');
         }
            else
                {$(this).focus();}
     } );
     
     
      // Peso
$('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').change(function() {
            if (($(this).val()<500 || $(this).val()> 5000) || $(this).val()=='')
                {alert('El peso del receptor debe estar entre 500 y 5000 gramos');
                $('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').val(''); }
            else
                {$('#siblh_mantenimientobundle_blhreceptor_pesoReceptor').focus();}
} );



     // Talla
$('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').change(function() {
            if (($(this).val()< 25 || $(this).val()> 55) || $(this).val()=='')
                {alert('La talla debe estar entre 25 y 55 cm');
                $('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').val(''); }
                
            else
                {$('#siblh_mantenimientobundle_blhreceptor_tallaIngreso').focus();}
} );
     
     
          // Perimetro
$('#siblh_mantenimientobundle_blhreceptor_pc').change(function() {
            if (($(this).val()< 20 || $(this).val()> 40) || $(this).val()=='')
                {alert('El perimetro cefalico debe estar entre 20 y 40');
                $('#siblh_mantenimientobundle_blhreceptor_pc').val('');}
            else
                {$('#siblh_mantenimientobundle_blhreceptor_pc').focus();}
} );
     


//validando campos vacios
   
   
 $('#siblh_mantenimientobundle_blhreceptor_duracionVentilacion').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor valido en duracion ventilacion ');}
            else
                {$(this).focus();}

} );



$('#siblh_mantenimientobundle_blhreceptor_duracionCpap').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor valido en duracion Cpap');}
            else
                {$(this).focus();}

} );




$('#siblh_mantenimientobundle_blhreceptor_duracionNpt').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor valido en duracion Npt');}
            else
                {$(this).focus();}

} );





$('#siblh_mantenimientobundle_blhreceptor_apgarPrimerMinuto').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor valido en APGAR al primer minuto');}
            else
                {$(this).focus();}

} );
   
   
   
$('#siblh_mantenimientobundle_blhreceptor_apgarQuintoMinuto').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor valido en APGAR al quinto minuto');}
                
            else
                {$(this).focus();}

} );
     
    
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



//Fin de modificacion de rox 

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
      $('#boton').button();    
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