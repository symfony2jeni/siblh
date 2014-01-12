$(document).ready(function() { 
    

    
 
//window.open("/app_dev.php/pacientes/");  

    
     $.noConflict();
	tableToGrid("#listado_receptores", {
        pager : '#pagerreceptores',
        rowNum:10, 
        height: '100%',
	width:800,
        gridview: true, 
        caption: "Listado de avances",
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre', width:30,align:'center'},
            {name:'Accion', width:10,align:'center', search:false}            
        ],
    
    });
    jQuery("#listado_receptores").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_receptores").jqGrid('navGrid','#pagerreceptores', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
    
    jQuery("#listado_receptores").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});  
      });
