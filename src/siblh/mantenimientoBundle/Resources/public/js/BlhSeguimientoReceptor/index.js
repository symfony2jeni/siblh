$(document).ready(function() {
   

    
    tableToGrid("#listado_Seguimiento", {
        pager : '#pagerSeguimiento',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        height:'100%',
        width:1800,
        caption: "Listado de seguimientos a receptores",
        colModel :[
            {name:'Nombre',width:50,align:'center'},
            {name:'Fecha', width:20,align:'center'},
            {name:'Periodo&nbsp;Evaluacion',width:25,align:'center', search:false},
            {name:'Semana', width:15,align:'center', search:false},
            {name:'Talla(cm)', width:15,align:'center', search:false}, 
            {name:'Ganancia/Pérdida&nbsp;talla(cm)', width:32,align:'center', search:false}, 
            {name:'Peso(g)', width:20,align:'center', search:false}, 
            {name:'Ganancia/Pérdida&nbsp;peso(g)', width:32,align:'center', search:false}, 
            {name:'Perímetro&nbsp;cefálico(cm)', width:30,align:'center', search:false}, 
            {name:'Ganancia/Pérdida&nbsp;PC(cm)', width:32,align:'center', search:false}, 
            {name:'Complicaciones', width:40,align:'center', search:false}, 
            {name:'Observaciones', width:40,align:'center', search:false}, 
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