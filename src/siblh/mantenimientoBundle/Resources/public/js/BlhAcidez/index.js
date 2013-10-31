$(document).ready(function() {
   
   
    tableToGrid("#listado_Acidez", {
        pager : '#pagerAcidez',
        rowNum:10, 
        gridview: true, 
       // height:'100%',
        //width:1400,
        caption: "Litado resultados de acidez dornic",
        colModel :[
            {name:'Acidez&nbsp;1',width:15,align:'center'},
            {name:'Acidez&nbsp;2', width:15,align:'center'},
            {name:'Acidez&nbsp;3', width:15,align:'center'},
            {name:'Factor', width:15,align:'center'}, 
            {name:'Resultado', width:35,align:'center'}, 
            {name:'Media&nbsp;Acidez', width:20,align:'center'},
            {name:'Acción', width:15,align:'center'}, 
    
        ],
       
    });
    jQuery("#listado_Acidez").jqGrid('sortGrid',"Acidez&nbsp;1",true);
    jQuery("#listado_Acidez").jqGrid('navGrid','#pagerAcidez', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


