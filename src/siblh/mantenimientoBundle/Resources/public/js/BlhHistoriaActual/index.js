//src/siblh/mantenimientoBundle/Resource/public/js/entidades/index.js
$(document).ready(function() { 
	alert('El documento está preparado'); 
});


$('#resultado').load(href, function(){
   $(this).dialog({
        modal: true, 
        width: 600
   })
});


$(document).ready(function() {
    $("h1").click(function(){
        $(this).css('color', 'red').fadeOut('slow').fadeIn('slow')    
    });
 
});
