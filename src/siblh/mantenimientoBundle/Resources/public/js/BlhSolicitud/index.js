$(document).ready(function() {
   

    
    tableToGrid("#listado_solicitudes", {
        pager : '#pagerSolicitudes',
        rowNum:10, 
        gridview: true, 
        height:'100%',
        width:1400,
        caption: "Listado de Solicitudes de Leche Humana",
        colModel :[
            {name:'Código',width:25,align:'center'},
            {name:'Fecha', width:15,align:'center'},
            {name:'Peso&nbsp;del&nbsp;paciente(g)', width:30,align:'center', search:false},
            {name:'Volumen&nbsp;por&nbsp;toma(ml)', width:28,align:'center', search:false}, 
            {name:'Tomas&nbsp;por&nbsp;día', width:20,align:'center', search:false},
            {name:'Calorías&nbsp;necesarias', width:25,align:'center', search:false},
            {name:'Acidez&nbsp;Dornic', width:20,align:'center', search:false},
            {name:'Volumen&nbsp;total&nbsp;por&nbsp;día(ml)', width:30,align:'center', search:false},
            {name:'Cuna', width:10,align:'center', search:false},
            {name:'Responsable', width:30,align:'center', search:false},
            {name:'Acción', width:10,align:'center', search:false} 
        ]
       
    });
    jQuery("#listado_solicitudes").jqGrid('sortGrid',"Código&nbsp;Solicitud",true);
    jQuery("#listado_solicitudes").jqGrid('navGrid','#pagerSolicitudes', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
    jQuery("#listado_solicitudes").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});


