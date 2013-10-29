$(document).ready(function() {

 tableToGrid("#listado_pasteurizaciones", {
        pager : '#pagerpasteurizaciones',
        rowNum:10, 
        gridview: true, 
       
        caption: "Seleccione la pasteurizacion",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'id',width:5,align:'center'},
            {name:'Codigo',width:10,align:'center'},
            {name:'Ciclo', width:2,align:'center'},
            {name:'VolumenPasteurizado', width:5,align:'center'},
            {name:'CantidadFrascos', width:5,align:'center'},
            {name:'FechaPasteurizacion', width:15,align:'center'},
            {name:'Accion', width:20,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_pasteurizaciones").jqGrid('sortGrid',"id",true);
    jQuery("#listado_pasteurizaciones").jqGrid('navGrid','#pagerpasteurizaciones', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });