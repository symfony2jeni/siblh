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
                          
$('#siblh_mantenimientobundle_blhdonante_documentoIdentificacion').on('change', function() {
    var regex = '';
    
    switch( this.value ) {
        case 'DUI':
            regex ='\\d{8}-\\d';
            $formato = '99999999-9';
            break;
        case 'Pasaporte':
           // data-bvalidator="regex[[A-Z][0-9]{8}]";
        regex ='A\\d{8}';
        $formato = 'A99999999'; 
            break;
        case 'Carnet de Minoridad':
            regex ='\\d{8}';
            $formato = '999999';
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



      




      

