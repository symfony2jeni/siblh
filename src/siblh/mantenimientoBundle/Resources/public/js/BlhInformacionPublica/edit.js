
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 $(document).ready(function() { 
     
      $.noConflict();
      
      
      $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaPublicacion"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           minDate:'todate',
                           maxDate: 'todate',
                           clearStatus: 'Borra fecha actual',  
                           //defaultDate: '01-01-2012',
                           yearRange: '2013:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
                          
 
   $('#siblh_mantenimientobundle_blhinformacionpublica_fechaPublicacion').
        attr('data-bvalidator', "regex['/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/']");

   $('#siblh_mantenimientobundle_blhinformacionpublica_path').
            attr('data-bvalidator', 'required');
    
                          
 
    $('#boton').button(); 
    $('#boton1').button(); 
    $('#boton2').button();
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
           
          
       $('#boton').on ('click', function() {
           
       $file=$('#siblh_mantenimientobundle_blhinformacionpublica_file').val();
       $fechaPublicacion=$('#siblh_mantenimientobundle_blhinformacionpublica_fechaPublicacion').val();
       $nombreDocumento=$('#siblh_mantenimientobundle_blhinformacionpublica_nombreDocumento').val();
       
        if($nombreDocumento == "" ) {
            alert("Pendiente titulo del documento !");
            return false;}
        else {
            alert("Datos actualizados !");
             }
       });
 });


