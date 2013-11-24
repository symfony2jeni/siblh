$(document).ready(function() {
   
   
    tableToGrid("#reportesLaboratorio", {
        height: 270,
        width: 1000,
        rowNum:5, 
        rownumbers: true,
        gridview: false,
        caption: "Listado de reportes de laboratorio",
        colNames:['Reporte','Acción'],
        colModel :[
            {name:'Reporte',width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}   
        ]       
    });
                                
});



