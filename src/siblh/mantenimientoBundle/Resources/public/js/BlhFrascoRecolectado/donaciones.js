$(document).ready(function() {

 tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
        gridview: true, 
        caption: "Seleccione la donante",
        sortorder: "desc",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'id',width:5,align:'center'},
            {name:'FechaDonacion', width:10,align:'center'},
            {name:'Nombre', width:40,align:'center'},
            {name:'Accion', width:20,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_donantes").jqGrid('sortGrid',"id",true);
    jQuery("#listado_donantes").jqGrid('navGrid','#pagerdonantes', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });