$(document).ready(function() {

 tableToGrid("#listado_Egresos", {
        pager : '#pagerEgresos',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre',width:20,align:'center'},
            {name:'Diagnostico&nbsp;de&nbsp;egreso',width:15,align:'center', search:false},
            {name:'Madre&nbsp;canguro', width:15,align:'center', search:false},
            {name:'Tipo&nbsp;de&nbsp;egreso', width:15,align:'center', search:false},
            {name:'Comentario&nbsp;egreso', width:10,align:'center', search:false},
            {name:'Traslado&nbsp;periferico', width:40,align:'center', search:false},
            {name:'Permanencia&nbsp;ucin',width:15,align:'center', search:false},
            {name:'Hospital&nbsp;de&nbsp;seguimiento', width:15,align:'center', search:false},
            {name:'Fecha&nbsp;de&nbsp;egreso', width:15,align:'center', search:false},
            {name:'Estancia&nbsp;hospitalaria', width:10,align:'center', search:false},          
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_Egresos").jqGrid('sortGrid',"id",true);
    jQuery("#listado_Egresos").jqGrid('navGrid','#pagerEgresos', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_Egresos").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
     });