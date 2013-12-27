$(document).ready(function() { 
    
//window.open("/app_dev.php/pacientes/");  

    
     $.noConflict();
	tableToGrid("#listado_personal", {
        pager : '#pagerpersonal',
        rowNum:10,
	rownumbers: true, 
         height: '100%',
        
        gridview: true, 
       caption: "Listado de personal del Banco de Leche",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Nombre',width:20,align:'center'},
            {name:'Accion', width:7,align:'center', search:false}  
        ]
    
    });
    jQuery("#listado_personal").jqGrid('sortGrid',"Nombre",true);
    jQuery("#listado_personal").jqGrid('navGrid','#pagerpersonal', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_personal").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });
