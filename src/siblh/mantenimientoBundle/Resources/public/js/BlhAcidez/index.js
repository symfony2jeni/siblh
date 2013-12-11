$(document).ready(function() {
   
   
    tableToGrid("#listado_Acidez", {
        pager : '#pagerAcidez',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        height:'100%',
        width:800,
        caption: "Litado resultados de acidez dornic",
        colModel :[
            {name:'Frasco', width:10,align:'center'}, 
            {name:'Factor(%)', width:10,align:'center'},
            {name:'Resultado', width:10,align:'center'}, 
            {name:'Acción', width:10,align:'center', search:false}, 
    
        ],
       
    });
    jQuery("#listado_Acidez").jqGrid('sortGrid',"Frasco",true);
    jQuery("#listado_Acidez").jqGrid('navGrid','#pagerAcidez', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
     jQuery("#listado_Acidez").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


