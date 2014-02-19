$(document).ready(function() { 
   //Inicio de modificacion de rox
           
  //Cuna
    

       $('#siblh_mantenimientobundle_blhsolicitud_cuna').blur(function()
    {
             if (($(this).val()< 1 || $(this).val()> 60) && $(this).val()!=='')
        {
         
            alert('El valor de cuna debe estar entre 1 y 60');
             $(this).focus();
             return false;
         }
            
     } );
     

    
    
     // Peso
     
$('#siblh_mantenimientobundle_blhsolicitud_pesoDia').blur(function() {
            if (($(this).val()< 500 || $(this).val()> 5000) || $(this).val()=='')
                {alert('el Peso debe estar entre 500 y 5000');
                $(this).focus();
             return false;
            }
                
            
} );
    

$('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').blur(function() {
   $variable = $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val();
            if (($variable=='') || ($variable < 5) || ($variable>60))
                {alert('El volumen por toma debe estar entre 5 y 60');
                 $(this).focus();
             return false;}
         else {calcular(); }
            
}       );





$('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').blur(function() {
    
    $variable = $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val();
            if (($variable=='') || ($variable < 3) || ($variable>12))
                {alert('Las tomas por dia debe estar entre 3 y 12');
                 $(this).focus();
             return false; }
        else {calcular();}
        
}       );


    $.noConflict();
    $.datepicker.setDefaults($.datepicker.regional["es"]);
      
          //Calendario  
     $('input[id$="_fechaSolicitud"]').datepicker({ dateFormat: 'yy-mm-dd',  
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
  
       
       
    //Dialog
    
$( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
       
       
    //Boton   
   
    $( "#boton" ).button();
    $( "#boton1" ).button();

       
 $('#siblh_mantenimientobundle_blhsolicitud_cuna').
            attr('data-bvalidator', 'required,between[1:60]');
  
 $('#siblh_mantenimientobundle_blhsolicitud_fechaSolicitud').
            attr('data-bvalidator', 'required');

 $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').
            attr('data-bvalidator', 'required,between[5:60]');

    
 $('#siblh_mantenimientobundle_blhsolicitud_pesoDia').
            attr('data-bvalidator', 'required,between[500:5000]');
  
    
 $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').
            attr('data-bvalidator', 'required,between[3:12]');
 
     
    
  //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
  
    $('form').bValidator(optionsRed);
 
 

 $('#responsable').on ('click', function() {
    $('#siblh_mantenimientobundle_blhsolicitud_responsable').val (this.value); 
    ;
    });
    
   //Otras validaciones
    
$('#boton').on('click',function()
{    
$vol=$('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val();
$tom=$('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val();


$volumen=parseInt($vol); 
$tomas=parseInt($tom);


if($tomas >=10) 
{
if($volumen>=30)
alert ('Error, cantidades de volumen por toma y tomas por dia demasiado grandes, ingrese cantidades aceptables');
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


function validarVacios()
{
    var allFieldsEmpty = true;

$(':input').each( function( input ) {  
    if( input.val() != null ) {
        
        allFieldsEmpty = false; 
    }
});

$(':select').each( function( input ) {  
    if( input.val() != null ) {
        allFieldsEmpty = false; 
    }
});

return allFieldsEmpty;
}

$( document ).unload(function() {
  if( validarVacios()==false ) {
  event.preventDefault();
  alert('prueba');
}


});




function calcular()
{
     
    $VolumenToma = ($('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val()==='')?5:$('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val();   
    $Toma =  ($('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val()==='')?3:$('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val();
    $VolumenDia = $VolumenToma * $Toma;          
    $('#siblh_mantenimientobundle_blhsolicitud_volumenPorDia').val($VolumenDia); 
          
        
    
}