$(document).ready(function() {

 tableToGrid("#listado_curvas", {
        pager : '#pagercurvas',
        rowNum:10, 
        gridview: true, 
       
        caption: "Seleccione la curva",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'id',width:5,align:'center'},
            {name:'ValorCurva',width:10,align:'center'},
            {name:'Fecha', width:2,align:'center'},
            {name:'CantidadFrascos', width:5,align:'center'},
            {name:'VolumenPasteurizado', width:5,align:'center'},
            {name:'Accion', width:20,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_curvas").jqGrid('sortGrid',"id",true);
    jQuery("#listado_curvas").jqGrid('navGrid','#pagercurvas', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });