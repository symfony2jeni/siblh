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
                           defaultDate: '-y',
                           clearStatus: 'Borra fecha actual', 
                            yearRange: '-1y:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });      
                          
    $('input[id$="_fechaPartoAnterior"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           defaultDate: null,
                           clearStatus: 'Borra fecha actual', 
                            yearRange: '-5y:-1y',
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

    $('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').
            attr('data-bvalidator', 'between[1:38]');    

$('#siblh_mantenimientobundle_blhhistorialclinico_amenorrea').
        attr('data-bvalidator-msg', "El valor debe estar entre 1 y 38"); 


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
$('#boton').on('click',function()
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

