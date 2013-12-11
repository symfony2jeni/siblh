$(document).ready(function() {
   
   
    tableToGrid("#listado_Sensorial", {
        pager : '#pagerSensorial',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        height:'100%',
       // width:'100%',
        caption: "Litado resultados de analisis sensorial",
        colModel :[
            {name:'Frasco',width:7,align:'center'},
            {name:'Embalaje',width:7,align:'center'},
            {name:'Suciedad', width:7,align:'center'},
            {name:'Color', width:7,align:'center'},
            {name:'Olor', width:7,align:'center'}, 
            {name:'Observación', width:30,align:'center', search:false}, 
            {name:'Acción', width:7,align:'center', search:false}
        ]
       
    });
    jQuery("#listado_Sensorial").jqGrid('sortGrid',"Embalaje",true);
    jQuery("#listado_Sensorial").jqGrid('navGrid','#pagerSensorial', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
       jQuery("#listado_Sensorial").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


