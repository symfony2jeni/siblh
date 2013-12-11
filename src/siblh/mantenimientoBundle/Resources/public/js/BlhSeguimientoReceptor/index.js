$(document).ready(function() {
   

    
    tableToGrid("#listado_Seguimiento", {
        pager : '#pagerSeguimiento',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        height:'100%',
        width:1400,
        caption: "Listado de seguimientos a receptores",
        colModel :[
            {name:'Nombre',width:50,align:'center'},
            {name:'Fecha', width:15,align:'center'},
            {name:'Semana', width:15,align:'center', search:false},
            {name:'Talla(cm)', width:15,align:'center', search:false}, 
            {name:'Ganancia&nbsp;talla&nbsp;día(cm)', width:25,align:'center', search:false}, 
            {name:'Peso(g)', width:20,align:'center', search:false}, 
            {name:'Ganancia&nbsp;peso&nbsp;día(g)', width:25,align:'center', search:false}, 
            {name:'Perímetro&nbsp;cefálico(cm)', width:30,align:'center', search:false}, 
            {name:'Complicaciones', width:40,align:'center', search:false}, 
            {name:'Acción', width:15,align:'center', search:false}, 
    
        ],
       
    });
    jQuery("#listado_Seguimiento").jqGrid('sortGrid',"Nombre",true);
    jQuery("#listado_Seguimiento").jqGrid('navGrid','#pagerSeguimiento', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
        jQuery("#listado_Seguimiento").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});
