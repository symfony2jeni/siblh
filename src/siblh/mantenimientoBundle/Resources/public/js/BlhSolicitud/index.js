$(document).ready(function() {
   

    
    tableToGrid("#listado_solicitudes", {
        pager : '#pagerSolicitudes',
        rowNum:10, 
        gridview: true, 
        //height:'100%',
        caption: "Listado de Solicitudes de Leche Humana",
        colModel :[
            {name:'Código&nbsp;Solicitud',width:15,align:'center'},
            {name:'Fecha', width:15,align:'center'},
            {name:'Peso&nbsp;del&nbsp;paciente(g)', width:20,align:'center'},
            {name:'Volumen&nbsp;por&nbsp;toma(ml)', width:20,align:'center'}, 
            {name:'Tomas&nbsp;por&nbsp;día', width:15,align:'center'},
            {name:'Calorías&nbsp;necesarias', width:20,align:'center'},
            {name:'Acidez&nbsp;Dornic', width:15,align:'center'},
            {name:'Volumen&nbsp;total&nbsp;por&nbsp;día', width:20,align:'center'},
            {name:'Cuna', width:10,align:'center'},
            {name:'Responsable', width:30,align:'center'},
            {name:'Acción', width:10,align:'center'}, 
    
        ],
       
    });
    jQuery("#listado_solicitudes").jqGrid('sortGrid',"Código&nbsp;Solicitud",true);
    jQuery("#listado_solicitudes").jqGrid('navGrid','#pagerSolicitudes', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


