$(document).ready(function() { 
 
   $('#siblh_mantenimientobundle_blhhistoriaactual_tallaDonante').
        attr('data-bvalidator', 'between[100:200],required');
$('#siblh_mantenimientobundle_blhhistoriaactual_pesoDonante').
        attr('data-bvalidator', 'between[22:136],required');
 
  
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
         $.noConflict();
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
   $('#button').button();
   $('#boton1').button();
});

