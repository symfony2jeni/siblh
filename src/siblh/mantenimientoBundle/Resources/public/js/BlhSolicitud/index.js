$(".records_list td a").click(function(){
  //Verificar si existe el elemento 'resultado' creado de alguna llamada anterior, y lo borra
  ($('#resultado')) ? $('#resultado').remove():'';
 
  //Recuperar el atributo href del enlace actual
  var href = $(this).attr('href');
 
  // crear un elemento para colocar la información
  var elem = $("<div id='resultado'>Resultado</div>");
 
  //Agregar el elemento después de la clase records_list
  elem.insertAfter($(".records_list"));
 
 // cargar mediante una llamada ajax la dirección que tiene href dentro de resultado 
 $('#resultado').load(href);
 
 // Para que no haga el comportamiento normal del enlace y cargue la página
 return false;
});
