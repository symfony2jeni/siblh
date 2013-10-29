$(document).ready(function() {
   

    
    tableToGrid("#listado_receptoresSeguimiento", {
        pager : '#pagerReceptoresSeguimiento',
        rowNum:10, 
        gridview: true, 
        caption: "Listado de receptores",
       // height:'auto',
        //width:1000,
        align:'center',
        colModel :[
            {name:'Código&nbsp;Receptor',width:17,align:'center'},
            {name:'Nombres', width:40,align:'center'},
            {name:'Apellidos', width:40,align:'center'},
            {name:'Sexo', width:20,align:'center'}, 
            {name:'Acción', width:20,align:'center'}, 
    
        ],
       
    });
    jQuery("#listado_receptoresSeguimiento").jqGrid('sortGrid',"Código&nbsp;Receptor",true);
    jQuery("#listado_receptoresSeguimiento").jqGrid('navGrid','#pagerReceptoresSeguimiento', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


