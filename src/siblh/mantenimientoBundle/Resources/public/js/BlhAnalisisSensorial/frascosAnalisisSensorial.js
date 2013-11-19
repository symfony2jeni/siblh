$(document).ready(function() {
   

    
    tableToGrid("#listado_frascosAnalisis", {
        pager : '#pagerFrascosAnalisis',
        rowNum:10, 
        gridview: true, 
        caption: "Listado frascos para analisis",
       // height:'auto',
        //width:1000,
        colModel :[
            {name:'Código&nbsp;Frasco',width:17,align:'center'},
            {name:'Volumen&nbsp;Recolectado(ml)', width:40,align:'center'},
            {name:'Volumen&nbsp;Recolectado(onz)', width:40,align:'center'},
            {name:'Forma&nbsp;Extracción', width:40,align:'center'},
            {name:'Observaciones', width:20,align:'center'}, 
            {name:'Acción', width:20,align:'center'}  
        ]       
    });
    jQuery("#listado_frascosAnalisis").jqGrid('sortGrid',"Código&nbsp;Frasco",true);
    jQuery("#listado_frascosAnalisis").jqGrid('navGrid','#pagerFrascosAnalisis', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});




