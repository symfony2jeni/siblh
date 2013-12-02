$(document).ready(function() {

 tableToGrid("#listado_Pasteurizacion", {
        pager : '#pagerPasteurizacion',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Ciclo', width:15,align:'center'},
            {name:'VolumenPasteurizado', width:15,align:'center'},
            {name:'FrascosPasteurizados', width:10,align:'center'},
            {name:'Fecha&nbsp;Pasteurizacion', width:40,align:'center', search:false},
            {name:'Hora&nbsp;Inicio&nbsp;Pasteurizacion',width:15,align:'center', search:false},
            {name:'Hora&nbsp;Final&nbsp;Pasteurizacion', width:15,align:'center', search:false},
            {name:'Hora&nbsp;Inicio&nbsp;Enfriamiento', width:15,align:'center', search:false},
            {name:'Hora&nbsp;Final&nbsp;Enfriamiento', width:10,align:'center', search:false},
            {name:'Responsable&nbsp;Pasteurizacion', width:10,align:'center'},          
            {name:'Accion', width:10,align:'center', search:false}
            
   
        ]
    
    });
    jQuery("#listado_Pasteurizacion").jqGrid('sortGrid',"id",true);
    jQuery("#listado_Pasteurizacion").jqGrid('navGrid','#pagerPasteurizacion', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_Pasteurizacion").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
    
     });