$(document).ready(function() { 
     $('button').button();
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
                          defaultDate: '2012-01-01',
                            yearRange: '2012:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });  
                          
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
            break;
        case 'Pasaporte':
           // data-bvalidator="regex[[A-Z][0-9]{8}]";
        regex ='A\\d{8}';
            break;
        case 'Carnet de Minoridad':
            regex ='[A-Z]\\d{5}';
            break;
        
    } 
    
    $('#siblh_mantenimientobundle_blhdonante_numeroDocumentoIdentificacion').
            attr('data-bvalidator', "regex["+regex+"]");
      //  attr('data-bvalidator', "regex[\\d{8}-\\d]");
 //  
  
});

});



      

