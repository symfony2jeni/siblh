$(document).ready(function() {

 tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
	rownumbers: true,
        gridview: true, 
        width: 750,
        height: '100%',
        caption: "Seleccione la donante",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'id',width:5,align:'center', search:false,hidden:true},
            {name:'Nombre', width:30,align:'center'},
             {name:'Accion', width:10,align:'center', search:false},
           
            
   
        ],
    
    });
    jQuery("#listado_donantes").jqGrid('sortGrid',"id",true);
    jQuery("#listado_donantes").jqGrid('navGrid','#pagerdonantes', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    jQuery("#listado_donantes").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });
