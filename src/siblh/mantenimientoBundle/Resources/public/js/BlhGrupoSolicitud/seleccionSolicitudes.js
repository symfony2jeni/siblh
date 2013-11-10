$(document).ready(function() {

 
 tableToGrid("#list13",{
   	//url:'server.php?q=2',
	datatype: "json",
   	
   	colModel:[
   		{name:'Codigo',index:'Codigo', width:55},
   		{name:'Fecha',index:'Fecha', width:90},
   		{name:'Nombres',index:'Nombres', width:100},
                {name:'Apellidos',index:'Apellidos', width:100},
   		{name:'Acidez',index:'Acidez', width:80},
   		{name:'Calorias',index:'Calorias', width:80},		
   		{name:'VolumenPorToma',index:'VolumenPorToma', width:80},		
   		{name:'TomaPorDia',index:'TomaPorDia', width:150}		
   	],
          loadComplete: function (){
            Enlace.cambiar();
            $("TD").css('white-space','normal');
        },
   	rowNum:10,
   	pager: '#pager13',
   	sortname: 'Codigo',
        viewrecords: true,
        sortorder: "asc",
	multiselect: true,
	caption: "Seleccione las solicitudes a agrupar"
       
	//editurl:"someurl.php"
      
});
jQuery("#list13").jqGrid('sortGrid',"Codigo",true);
jQuery("#list13").jqGrid('navGrid','#pager13',{add:false,edit:false,del:false}
	
);

var $s;
var $x=1;
/*jQuery("#cm1").click( function() {
	
	$s = jQuery("#list13").jqGrid('getGridParam','selarrrow');
	alert($s);
        //$('#2').val (s);
       // $("#2").val ($x);
});*/


$('#prueba').on ('click', function() {
    
  $s = jQuery("#list13").jqGrid('getGridParam','selarrrow');
	//alert($s);  
 
this.value = $s; } ); 
 


/*jQuery("#cm1s").click( function() {
	jQuery("#list13").jqGrid('setSelection',"13");
});*/

});