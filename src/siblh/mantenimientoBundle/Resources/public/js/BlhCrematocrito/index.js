$(document).ready(function() {
   
   
    tableToGrid("#listado_crematocrito", {
        pager : '#pagerCrematocrito',
        rowNum:10, 
        gridview: true, 
        height:'100%',
        //width:1400,
        caption: "Litado resultados de crematocrito",
        colModel :[
            {name:'Frasco',width:15,align:'center'},
            {name:'Media&nbsp;crema(mm)', width:15,align:'center', search:false},
            {name:'Media&nbsp;calorias(mm)', width:20,align:'center', search:false},
            {name:'Porcentaje&nbsp;crema', width:15,align:'center', search:false},
            {name:'Kilocalorias', width:15,align:'center'},
            {name:'Acción', width:15,align:'center', search:false}, 
    
        ],
       
    });
    jQuery("#listado_crematocrito").jqGrid('sortGrid',"Crema&nbsp;1(ml)",true);
    jQuery("#listado_crematocrito").jqGrid('navGrid','#pagerCrematocrito', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
    jQuery("#listado_crematocrito").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


