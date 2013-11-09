$(document).ready(function() { 
     //$('#button').button();
     $.noConflict();
  
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
  
       
    //Boton   
   
    $( "#boton" ).button();
      
    $('#siblh_mantenimientobundle_blhanalisissensorial_observacion').
            attr('data-bvalidator', 'required');

   
      
      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);

  
 


});