$(document).ready(function() {
    tableToGrid("#frascosAnalisisCrematocrito", {
        pager : '#pagerFrascosAnalisisCrematocrito',
        rowNum:10, 
        gridview: true, 
        caption: "Listado frascos para analisis",
        height:'100%',
        width:1100,
        colModel :[
            {name:'Código',width:17,align:'center'},
            {name:'Volumen(ml)', width:40,align:'center'},
            {name:'Volumen(onz)', width:40,align:'center'},
            {name:'Forma&nbsp;Extracción', width:40,align:'center', search:false}, 
            {name:'Acción', width:20,align:'center', search:false}  
        ]       
    });
    jQuery("#frascosAnalisisCrematocrito").jqGrid('sortGrid',"Código",true);
    jQuery("#frascosAnalisisCrematocrito").jqGrid('navGrid','#pagerFrascosAnalisCrematocrito', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
     jQuery("#frascosAnalisisCrematocrito").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


