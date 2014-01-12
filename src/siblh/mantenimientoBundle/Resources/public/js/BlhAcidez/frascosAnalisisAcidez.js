$(document).ready(function() {
    tableToGrid("#frascosAnalisisAcidez", {
        pager : '#pagerFrascosAnalisisAcidez',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        caption: "Listado frascos para analisis",
        height:'100%',
        width:1100,
        colModel :[
            {name:'Código',width:15,align:'center'},
            {name:'Volumen(ml)', width:20,align:'center'},
            {name:'Volumen(onz)', width:20,align:'center'},
            {name:'Forma&nbsp;Extracción', width:30,align:'center', search:false}, 
            {name:'Acción', width:20,align:'center', search:false}  
        ]       
    });
    jQuery("#frascosAnalisisAcidez").jqGrid('sortGrid',"Código",true);
    jQuery("#frascosAnalisisAcidez").jqGrid('navGrid','#pagerFrascosAnalisisAcidez', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
     jQuery("#frascosAnalisisAcidez").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


