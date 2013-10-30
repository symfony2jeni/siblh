//src/minsal/academicaAnBundle/Resource/public/js/Estudiante/index.js
$(document).ready(function() {

    
    tableToGrid("#listado_receptores", {
        pager : '#pagerReceptores',
        rowNum:10, 
        gridview: true, 
        //height:'100%',
        caption: "Listado de receptores",
        
        
        colModel :[
            {name:'Código&nbsp;Receptor',width:25,align:'center'},
            {name:'Nombres', width:40,align:'center'},
            {name:'Apellidos', width:40,align:'center'},
            {name:'Sexo', width:20,align:'center'}, 
            {name:'Acción', width:20,align:'center'}, 
   
        ],
    
    });
    jQuery("#listado_receptores").jqGrid('sortGrid',"Código&nbsp;Receptor",true);
    jQuery("#listado_receptores").jqGrid('navGrid','#pagerReceptores', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});