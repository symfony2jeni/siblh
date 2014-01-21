/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() { 
    $.noConflict();
   $('#boton').button();
   $('#boton1').button();

 
   
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
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
  
 
 
    //Validar el formulario
         
    $('form').bValidator(optionsRed);



    $('#boton1').on ('click', function() {
           
       $temperaturaP=$('#siblh_mantenimientobundle_blhtemperaturapasteurizacion_temperaturaP').val();
  
       
        if(($temperaturaP == "") || ($temperaturaP < 62)|| ($temperaturaP > 66)){
            alert("Ingrese valores para la temperatura de 62 a 66 grados C");
            return false;}
           
        else
            {
             alert("Datos almacenados");
                 
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