$(document).ready(function() {
   
   
    tableToGrid("#seleccionPasteurizacion", {
        rowNum:5, 
        gridview: true, 
        height:'100%',
        width:1100,
        caption: "Listado de pasteurizaciones disponibles",
        colModel :[
            {name:'Código',width:5,align:'center'},
            {name:'Ciclo', width:5,align:'center'},
            {name:'Volumen&nbsp;pasteurizado', width:10,align:'center'},
            {name:'Cantidad&nbsp;de&nbsp;frascos', width:10,align:'center'}, 
            {name:'Fecha&nbsp;pasteurizacion', width:10,align:'center'}, 
            {name:'Responsable&nbsp;pasteurizacion', width:15,align:'center'},
            {name:'Acción', width:10,align:'center'} 
    
        ]
       
    });
  
});


