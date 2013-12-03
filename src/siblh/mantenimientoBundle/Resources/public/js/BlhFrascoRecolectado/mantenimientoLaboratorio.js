$(document).ready(function() {
   
   
    tableToGrid("#mantenimientoLaboratorio", {
        height: '100%',
        width: 800,
        rowNum:5, 
        rownumbers: true,
        gridview: false,
        caption: "Mantenimientos de laboratorio",
        colNames:['Nombre','Acción'],
        colModel :[
            {name:'Nombre',width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}   
        ]       
    });
                                
});


