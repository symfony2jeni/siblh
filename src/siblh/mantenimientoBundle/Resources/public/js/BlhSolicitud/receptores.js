//src/minsal/academicaAnBundle/Resource/public/js/Estudiante/index.js
$(document).ready(function() {

    
    tableToGrid("#listado_receptores", {
        pager : '#pagerReceptores',
        rowNum:10, 
        gridview: true, 
        width:'1000',
        height:'100%',
        caption: "Listado de receptores",
        
        
        colModel :[
            {name:'Código',width:15,align:'center'},
            {name:'Nombre', width:60,align:'center'},
            {name:'Sexo', width:20,align:'center', search:false}, 
            {name:'Acción', width:20,align:'center', search:false} 
        ]
    
    });
    jQuery("#listado_receptores").jqGrid('sortGrid',"Código",true);
    jQuery("#listado_receptores").jqGrid('navGrid','#pagerReceptores', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_receptores").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});