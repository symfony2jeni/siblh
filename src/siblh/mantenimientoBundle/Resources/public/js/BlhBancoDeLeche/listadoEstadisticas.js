$(document).ready(function() {
   
   
    tableToGrid("#listadoEstadisticas", {
        height: 90,
        width: 1000,
        rowNum:5, 
        rownumbers: true,
        gridview: false,
        caption: "Listado de estadisticas",
        colNames:['Reporte','Acción'],
        colModel :[
            {name:'Reporte',width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}   
        ]       
    });
                                
});


