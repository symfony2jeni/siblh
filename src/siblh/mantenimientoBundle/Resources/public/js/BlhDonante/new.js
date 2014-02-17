$(document).ready(function() { 
       
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaNacimiento"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: '-35y-01-01',
                           //minDate: '-34y',
                           //maxDate: '-13y',
                          yearRange: '-35y:-13y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                          
     $('input[id$="_fechaRegistroDonanteBlh"]').datepicker({ dateFormat: 'yy-mm-dd',  
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
                          
                           $('#boton').button();
                          
                          
                        //  $('#siblh_mantenimientobundle_blhdonante_numeroDocumentoIdentificacion').
      //  attr('data-bvalidator', 'regex[a{3}],required');
                          
                          //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    var $formato;
                          
$('#siblh_mantenimientobundle_blhdonante_documentoIdentificacion').on('change', function() {
    var regex = '';
    
    switch( this.value ) {
        case 'DUI':
            regex ='\\d{8}-\\d';
            $formato = '99999999-9';
            break;
        case 'Pasaporte':
         regex ='A\\d{8}';
        $formato = 'A99999999'; 
            break;
        case 'Minoridad':
            regex ='\\d{6}';
            $formato = 'A99999999'; 
            break;
        
    } 
    
    $('#siblh_mantenimientobundle_blhdonante_numeroDocumentoIdentificacion').
            attr('data-bvalidator', "regex["+regex+"]");
      //  attr('data-bvalidator', "regex[\\d{8}-\\d]");
 //  
  $('#siblh_mantenimientobundle_blhdonante_numeroDocumentoIdentificacion').
        attr('data-bvalidator-msg', "Ingrese el numero de documento en el formato correcto "+$formato+""); 

});


  $('#siblh_mantenimientobundle_blhdonante_telefonoFijo').
        attr('data-bvalidator', "regex[\\d{4}-\\d{4}]");

$('#siblh_mantenimientobundle_blhdonante_telefonoFijo').
        attr('data-bvalidator-msg', "Ingrese el telefono en el formato correcto 9999-9999");


$('#siblh_mantenimientobundle_blhdonante_telefonoMovil').
        attr('data-bvalidator', "regex[\\d{4}-\\d{4}]");
 
$('#siblh_mantenimientobundle_blhdonante_telefonoMovil').
        attr('data-bvalidator-msg', "Ingrese el telefono en el formato correcto 9999-9999"); 

$('#siblh_mantenimientobundle_blhdonante_registro').
        attr('data-bvalidator', "regex[\\d{6}-\\d{4}]");
 
$('#siblh_mantenimientobundle_blhdonante_registro').
        attr('data-bvalidator-msg', "Ingrese el registro en el formato correcto 999999-9999"); 
 $('#siblh_mantenimientobundle_blhdonante_fechaNacimiento').
            attr('data-bvalidator', 'required'); 
    
     $('#siblh_mantenimientobundle_blhdonante_fechaRegistroDonanteBlh').
            attr('data-bvalidator', 'required'); 



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

 

});

function Numeros_Guion(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8) || (keynum === 45))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}

function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 

  function soloLetras(e){
     tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; // backspace
    if (tecla==32) return true; // espacio
    if (tecla==239) return true; // acento
    if (e.ctrlKey && tecla==86) { return true;} //Ctrl v (Pegar)
    if (e.ctrlKey && tecla==67) { return true;} //Ctrl c (Copiar)
    if (e.ctrlKey && tecla==88) { return true;} //Ctrl x (Cortar)
 
    letras = /[a-zA-ZáéíóúñÑ]/; //letras permitidas
 
    te = String.fromCharCode(tecla); 
    return letras.test(te); // prueba de letras permitidas
    }