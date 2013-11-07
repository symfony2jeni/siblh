$(document).ready(function() {
   
   
    tableToGrid("#listado_crematocrito", {
        pager : '#pagerCrematocrito',
        rowNum:10, 
        gridview: true, 
       // height:'100%',
        //width:1400,
        caption: "Litado resultados de crematocrito",
        colModel :[
            {name:'Crema&nbsp;1(ml)',width:15,align:'center'},
            {name:'Crema&nbsp;2(ml)', width:15,align:'center'},
            {name:'Crema&nbsp;3(ml)', width:15,align:'center'},
            {name:'Coliformes&nbsp;1(ml)', width:15,align:'center'}, 
            {name:'Coliformes&nbsp;2(ml)', width:15,align:'center'}, 
            {name:'Coliformes&nbsp;3(ml)', width:15,align:'center'},
            {name:'Media&nbsp;crema(ml)', width:15,align:'center'},
            {name:'Media&nbsp;coliformes(ml)', width:20,align:'center'},
            {name:'Porcentaje&nbsp;crema', width:15,align:'center'},
            {name:'Kilocalorias', width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}, 
    
        ],
       
    });
    jQuery("#listado_crematocrito").jqGrid('sortGrid',"Crema&nbsp;1(ml)",true);
    jQuery("#listado_crematocrito").jqGrid('navGrid','#pagerCrematocrito', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


