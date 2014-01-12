$(document).ready(function() {
   

    
    tableToGrid("#listado_receptoresSeguimiento", {
        pager : '#pagerReceptoresSeguimiento',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        caption: "Listado de receptores",
        height:'100%',
        width:1000,
        align:'center',
        colModel :[
            {name:'Código',width:15,align:'center'},
            {name:'Nombre', width:70,align:'center'},
            {name:'Sexo', width:20,align:'center', search:false}, 
            {name:'Acción', width:20,align:'center', search:false}     
        ]
       
    });
    jQuery("#listado_receptoresSeguimiento").jqGrid('sortGrid',"Código",true);
    jQuery("#listado_receptoresSeguimiento").jqGrid('navGrid','#pagerReceptoresSeguimiento', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
     jQuery("#listado_receptoresSeguimiento").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


