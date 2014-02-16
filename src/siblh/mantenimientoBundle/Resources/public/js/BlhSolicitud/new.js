$(document).ready(function() { 
    
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
 
    
  $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').keyup(function(){
      
      //if( $(this).val() > 3 && $(this).val() < 12 && $(this).val()!==''){
      $('#siblh_mantenimientobundle_blhsolicitud_volumenPorDia').click();//}
      var aux = $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val();
     
      if ( $(this).val() < 3 || $(this).val() > 12 || $(this).val()==='')
      {
          if($(this).val()== 1)
          {
              return false;
          }
          $(this).val('');
          $(this).focusin();
          return false;
      }
      
      
      
      if ( aux < 5 || aux > 60 )
      {
          $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val('');
          $(this).val('');
          $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').focusin();
          return false;
      }
      
      
      
  });
  
  $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').keyup(function(){
      
      var aux = ($('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val()==='')?0:$('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val();
      
    
      if ( aux >= 3 && aux <= 12 &&($(this).val()>= 5 && $(this).val()<= 60))
      {
          $('#siblh_mantenimientobundle_blhsolicitud_volumenPorDia').click();
      }
      else {}
      
      
  });
  
  $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').blur(function(){
      
      if(($(this).val()< 5 || $(this).val()> 60)){
          
          $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val('');
          $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').focusin();
         
          }
      
          
      
     
       event.preventDefault();
      
  });
    
  //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
  
    $('form').bValidator(optionsRed);
             

  //Calculando campos                        

var $VolumenToma; 
var $VolumenDia;

$('#siblh_mantenimientobundle_blhsolicitud_volumenPorDia').on ('click', function() {
    $VolumenToma =  $('#siblh_mantenimientobundle_blhsolicitud_volumenPorToma').val();
    $VolumenDia =  $('#siblh_mantenimientobundle_blhsolicitud_tomaPorDia').val();
     if (($VolumenToma == '') || ($VolumenDia == '') || ($VolumenToma <5) || ($VolumenToma > 60) || ($VolumenDia <3) || ($VolumenDia >12) ) 
{ alert ('Digite valores validos para volumen por toma y tomas por dia');
    return false;}
else {
    $VolumenDia = $VolumenToma * $VolumenDia;
this.value = $VolumenDia; } 
} ); 


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
{alert ('Error, cantidades de volumen por toma y tomas por dia demasiado grandes, ingrese cantidades aceptables');
return false;}
}    
});

    $('#siblh_mantenimientobundle_blhsolicitud_volumenPorDia').
            attr('data-bvalidator', 'required'); 
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

      
