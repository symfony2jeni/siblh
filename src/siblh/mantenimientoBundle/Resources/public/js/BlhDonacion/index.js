//src/siblh/mantenimientoBundle/Resource/public/js/entidades/index.js
$(document).ready(function() { 
	tableToGrid("#listado_d", {
        pager : '#pagerd',
        rowNum:10, 
         height: '100%',
        gridview: true, 
       // widht: 60,
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre',width:30,align:'center'},
            {name:'Fecha',width:10,align:'center', search:false},
            {name:'Responsable', width:10,align:'center', search:false},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_d").jqGrid('sortGrid',"id",true);
    jQuery("#listado_d").jqGrid('navGrid','#pagerd', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
      jQuery("#listado_d").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
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
