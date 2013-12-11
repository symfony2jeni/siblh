$(document).ready(function() {

 tableToGrid("#listado_pasteurizaciones", {
        pager : '#pagerpasteurizaciones',
        rowNum:10,
	rownumbers: true, 
        width: 750,
        height: '100%',
        gridview: true, 
       
        caption: "Seleccione la pasteurizacion",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:10,align:'center'},
            {name:'Ciclo', width:4,align:'center', search:false},
            {name:'VolumenPasteurizado', width:10,align:'center'},
            {name:'CantidadFrascos', width:10,align:'center'},
            {name:'FechaPasteurizacion', width:10,align:'center', search:false},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_pasteurizaciones").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_pasteurizaciones").jqGrid('navGrid','#pagerpasteurizaciones', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_pasteurizaciones").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });
