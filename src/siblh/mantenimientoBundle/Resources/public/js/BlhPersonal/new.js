$(document).ready(function() { 
   $.noConflict();
    $('#button').button();
     $('#siblh_mantenimientobundle_blhpersonal_nombre').
              attr('data-bvalidator', 'required'); 

$('#button').on('click', function() {
    
    $val=$('#siblh_mantenimientobundle_blhpersonal_nombre').val();
    if($val === '')
        {alert('Digite un nombre valido');
        return false;}
});

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
