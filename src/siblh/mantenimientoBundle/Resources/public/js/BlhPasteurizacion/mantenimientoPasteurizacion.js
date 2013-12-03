$(document).ready(function() {
   
   
    tableToGrid("#mantenimientoPasteurizacion", {
        height: '100%',
        width: 800,
        rowNum:5, 
        rownumbers: true,
        gridview: false,
        caption: "Mantenimientos de pasteurizacion",
        colNames:['Nombre','Acción'],
        colModel :[
            {name:'Nombre',width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}   
        ]       
    });
                                
});

