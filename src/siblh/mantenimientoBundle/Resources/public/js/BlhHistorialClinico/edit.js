$(document).ready(function() { 
    
    $aux = 0;

    $aux2 = 0;//Inicio de modificacion de rox
    
    //Periodo Intergenesico
    
       $('#siblh_mantenimientobundle_blhhistorialclinico_periodoIntergenesico').keyup(function()
    {
             if (($(this).val()< 1 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_periodoIntergenesico').val('');
            alert('El periodo intergenesico debe estar entre 1 y 20');
         }
            else
                {$(this).focus();}
     } );
     
     
     
     $('#siblh_mantenimientobundle_blhhistorialclinico_periodoIntergenesico').change(function() {
            if ($(this).val()=='')
                {alert('El periodo intergenesico debe estar entre 1 y 20');}
                
            else
                {$(this).focus();}
                 } );

//Control

   $('#siblh_mantenimientobundle_blhhistorialclinico_numeroControl').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 9) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_numeroControl').val('');
            alert('El numero de control debe estar entre 0 y 9');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_numeroControl').change(function() {
            if ($(this).val()=='')
                {alert('El numero de control debe estar entre 0 y 9');}
                
            else
                {$(this).focus();}
    } );



   //formulaObstetricaG
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaG').keyup(function()
    {
             if (($(this).val()< 1 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaG').val('');
            alert('Digite un valor entre 1 y 20');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaG').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor entre 1 y 20');}
                
            else
                {$(this).focus();}
    } );


 //formulaObstetricaP1
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP1').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP1').val('');
            alert('Digite un valor entre 0 y 20');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP1').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor entre 0 y 20');}
                
            else
                {$(this).focus();}
    } );
    
    
     //formulaObstetricaP2
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP2').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP2').val('');
            alert('Digite un valor entre 0 y 20');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaP2').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor entre 0 y 20');}
                
            else
                {$(this).focus();}
    } );
    
 
       //formulaObstetricaA
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaA').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaA').val('');
            alert('Digite un valor entre 0 y 20');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaA').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor entre 0 y 20');}
                
            else
                {$(this).focus();}
    } );
    
    
      //formulaObstetricaV
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaV').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaV').val('');
            alert('Digite un valor entre 0 y 20');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaV').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor entre 0 y 20');}
                
            else
                {$(this).focus();}
    } );



     //formulaObstetricaM
 $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaM').keyup(function()
    {
             if (($(this).val()< 0 || $(this).val()> 20) && $(this).val()!=='')
        {
            $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaM').val('');
            alert('Digite un valor entre 0 y 20');
         }
            else
                {$(this).focus();}
     } );
     

     $('#siblh_mantenimientobundle_blhhistorialclinico_formulaObstetricaM').change(function() {
            if ($(this).val()=='')
                {alert('Digite un valor entre 0 y 20');}
                
            else
                {$(this).focus();}
    } );


 //Fin de modificacion de rox

    
   


$('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').on ('click', function() {
    $aux = 1;
     });
    
  $('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').on ('click', function() {
    $aux = 1;
     });
      
      
     $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').click(function() {
         $aux2 = 1;
        if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );



$('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').click(function() {
            if (calcular($(this).val()))
                {}
            else
                {$(this).focus();}
}       );




     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaUltimaRegla"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           defaultDate: null,
                           clearStatus: 'Borra fecha actual',  
                           minDate: '-16m',
                           maxDate: 'm',
                         // monthRange: '-2m:m',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                           onSelect: function(textoFecha, objDatepicker){
			   calcular( $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').val());
                            }
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
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                           onSelect: function(textoFecha, objDatepicker){
			   calcular( $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').val());
                            }
                          });      
                          
    $('input[id$="_fechaPartoAnterior"]').datepicker({ dateFormat: 'yy-mm-dd',  
                          hangeMonth: true,
                           changeYear: true,
                           defaultDate: 'today',
                           clearStatus: 'Borra fecha actual', 
                           yearRange: '-37y:y',
                           //minDate: '2012-10-08',
                           maxDate: '-7m',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });    
     $('#boton').button();  
     $('#button').button();  
                          
 //$('form').bValidator(optionsRed);
  $('#lugC').hide();
  $('#numC').hide();
                          
$('#siblh_mantenimientobundle_blhhistorialclinico_controlPrenatal').on('change', function() {
       
    switch( this.value ) {
        case 'No':
           $('#lugC').hide();
        
           
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
      
        $('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').
            attr('data-bvalidator', 'required');  

  /*  $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').
            attr('data-bvalidator', 'between[1:38]');    

$('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').
        attr('data-bvalidator-msg', "El valor debe estar entre 1 y 38");  */


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


   
$('#button').on ('click', function() {

$fregla=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').val();
$fparto=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').val();

$fregla = new Date($fregla);
$fparto = new Date($fparto);
      
  $resta =  ($fparto.getYear() * 12 + $fparto.getMonth()) - ($fregla.getYear() * 12 + $fregla.getMonth());

if ($resta > 10)
{
alert ('La diferencia entre fecha de parto y fecha de ultima regla no puede ser mayor a 10 meses');
return false;
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
     
$fregla=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaUltimaRegla').val();
$fparto=$('#siblh_mantenimientobundle_blhhistorialclinico_fechaParto').val();

$fregla = new Date($fregla);
$fparto = new Date($fparto);
      
  $resta =  ($fparto.getYear() * 12 + $fparto.getMonth()) - ($fregla.getYear() * 12 + $fregla.getMonth());
//alert ($resta);
if ($resta > 10)
{
alert ('La diferencia entre fecha de parto y fecha de ultima regla no puede ser mayor a 10 meses');
return false;
}

    else {
            
 //$fregla = new Date($fregla);

$fr = $fregla.getDate();

//$fparto = new Date($fparto);
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
           
            $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').val($dias); 
            return true;
        } 
    
}

