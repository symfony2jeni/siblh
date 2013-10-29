$(document).ready(function() {
   

    
    tableToGrid("#listado_Seguimiento", {
        pager : '#pagerSeguimiento',
        rowNum:10, 
        gridview: true, 
       // height:'100%',
        //width:700,
        caption: "Listado de seguimientos a receptores",
        colModel :[
            {name:'Nombre&nbsp;receptor',width:40,align:'center'},
            {name:'Fecha', width:15,align:'center'},
            {name:'Semana', width:10,align:'center'},
            {name:'Talla(cm)', width:15,align:'center'}, 
            {name:'Ganancia&nbsp;de&nbsp;talla&nbsp;por&nbsp;día(cm)', width:25,align:'center'}, 
            {name:'Peso(g)', width:20,align:'center'}, 
            {name:'Ganancia&nbsp;de&nbsp;peso&nbsp;por&nbsp;día(g)', width:25,align:'center'}, 
            {name:'Perímetro&nbsp;cefálico(cm)', width:20,align:'center'}, 
            {name:'Complicaciones', width:40,align:'center'}, 
            {name:'Acción', width:15,align:'center'}, 
    
        ],
       
    });
    jQuery("#listado_Seguimiento").jqGrid('sortGrid',"Nombre&nbsp;receptor",true);
    jQuery("#listado_Seguimiento").jqGrid('navGrid','#pagerSeguimiento', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});
