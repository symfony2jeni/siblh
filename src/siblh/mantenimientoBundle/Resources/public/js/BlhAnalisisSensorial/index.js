$(document).ready(function() {
   
   
    tableToGrid("#listado_Sensorial", {
        pager : '#pagerSensorial',
        rowNum:10, 
        gridview: true, 
       // height:'100%',
        //width:1400,
        caption: "Litado resultados de analisis sensorial",
        colModel :[
            {name:'Embalaje',width:15,align:'center'},
            {name:'Suciedad', width:15,align:'center'},
            {name:'Color', width:15,align:'center'},
            {name:'Olor', width:15,align:'center'}, 
            {name:'Observación', width:35,align:'center'}, 
            {name:'Acción', width:15,align:'center'}, 
    
        ],
       
    });
    jQuery("#listado_Sensorial").jqGrid('sortGrid',"Embalaje",true);
    jQuery("#listado_Sensorial").jqGrid('navGrid','#pagerSensorial', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


