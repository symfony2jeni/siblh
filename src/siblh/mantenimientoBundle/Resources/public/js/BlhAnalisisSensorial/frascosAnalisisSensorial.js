$(document).ready(function() {
   

    
    tableToGrid("#listado_frascosAnalisis", {
        pager : '#pagerFrascosAnalisis',
        rowNum:10, 
        gridview: true, 
        caption: "Listado frascos para analisis",
        height:'100%',
        width:1100,
        colModel :[
            {name:'Código',width:15,align:'center'},
            {name:'Volumen(ml)', width:20,align:'center'},
            {name:'Volumen(onz)', width:20,align:'center'},
            {name:'Forma&nbsp;Extracción', width:20,align:'center', search:false},
            {name:'Acción', width:20,align:'center', search:false}  
        ]       
    });
    jQuery("#listado_frascosAnalisis").jqGrid('sortGrid',"Código",true);
    jQuery("#listado_frascosAnalisis").jqGrid('navGrid','#pagerFrascosAnalisis', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
    jQuery("#listado_frascosAnalisis").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});




