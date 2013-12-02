$(document).ready(function() {

 tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
        width: 700,
         height: '100%',
        gridview: true, 
        caption: "Seleccione la donante",
        sortorder: "desc",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'FechaDonacion', width:10,align:'center', search:false},
            {name:'Nombre', width:30,align:'center'},
            {name:'Accion', width:20,align:'center', search:false}
           
            
   
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