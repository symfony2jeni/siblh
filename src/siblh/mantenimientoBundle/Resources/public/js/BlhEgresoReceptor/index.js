$(document).ready(function() {

 tableToGrid("#listado_Egresos", {
        pager : '#pagerEgresos',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Diagnostico&nbsp;de&nbsp;egreso',width:15,align:'center'},
            {name:'Madre&nbsp;canguro', width:15,align:'center'},
            {name:'Tipo&nbsp;de&nbsp;egreso', width:15,align:'center'},
            {name:'Comentario&nbsp;egreso', width:10,align:'center'},
            {name:'Traslado&nbsp;periferico', width:40,align:'center'},
            {name:'Permanencia&nbsp;ucin',width:15,align:'center'},
            {name:'Hospital&nbsp;de&nbsp;seguimiento', width:15,align:'center'},
            {name:'Fecha&nbsp;de&nbsp;egreso', width:15,align:'center'},
            {name:'Estancia&nbsp;hospitalaria', width:10,align:'center'},
          
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_Egresos").jqGrid('sortGrid',"id",true);
    jQuery("#listado_Egresos").jqGrid('navGrid','#pagerEgresos', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });