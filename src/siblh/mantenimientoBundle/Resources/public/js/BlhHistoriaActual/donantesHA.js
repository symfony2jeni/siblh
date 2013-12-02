$(document).ready(function() {

 tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
        gridview: true, 
        caption: "Seleccione la donante",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'id',width:5,align:'center'},
            {name:'Nombre', width:40,align:'center'},
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