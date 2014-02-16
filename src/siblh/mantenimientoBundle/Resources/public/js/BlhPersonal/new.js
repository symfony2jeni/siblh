$(document).ready(function() { 
   $.noConflict();
    $('#button').button();
     $('#siblh_mantenimientobundle_blhpersonal_nombre').
              attr('data-bvalidator', 'required'); 
       
});

function soloTexto(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}