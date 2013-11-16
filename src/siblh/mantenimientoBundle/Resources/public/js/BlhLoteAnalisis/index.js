$(document).ready(function() { 

  tableToGrid("#lotes", {
        pager : '#pagerlotes',
        rowNum:10, 
        gridview: true,
        multiselect:true,
       // height:'100%',
        //width:1400,
        caption: "Lotes registrados que aun no se les ha asignado frascos para analisis",
        colModel :[
            {name:'Codigo&nbsp;lote',width:15,align:'center'},
            {name:'Fecha',width:15,align:'center'},
            {name:'Responsable&nbsp;analisis', width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}
           
        ],
       
    });
    jQuery("#lotes").jqGrid('sortGrid',"Codigo&nbsp;lote",true);
    jQuery("#lotes").jqGrid('navGrid','#pagerlotes', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true      
    });
 
});