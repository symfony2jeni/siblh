$(document).ready(function() { 
     /*$('button').button();*/
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
    
    $('#boton')
      .button();
     

  

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
    

  
 $('#siblh_mantenimientobundle_blhcrematocrito_crema1').
            attr('data-bvalidator', 'min[1],required');

  $('#siblh_mantenimientobundle_blhcrematocrito_crema2').
            attr('data-bvalidator', 'min[1],required');
    
 $('#siblh_mantenimientobundle_blhcrematocrito_crema3').
            attr('data-bvalidator', 'min[1],required');
    
 $('#siblh_mantenimientobundle_blhcrematocrito_ct1').
            attr('data-bvalidator', 'min[1],required');
  
 
  $('#siblh_mantenimientobundle_blhcrematocrito_ct2').
            attr('data-bvalidator', 'min[1],required');                         

 $('#siblh_mantenimientobundle_blhcrematocrito_ct3').
            attr('data-bvalidator', 'min[1],required');




});