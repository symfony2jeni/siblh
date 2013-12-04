$(document).ready(function() {

 tableToGrid("#listado_Pasteurizacion", {
        pager : '#pagerPasteurizacion',
        rowNum:10, 
         height: '100%',
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Ciclo', width:15,align:'center'},
            {name:'VolumenPasteurizado', width:15,align:'center'},
            {name:'FrascosPasteurizados', width:18,align:'center'},
            {name:'Fecha&nbsp;Pasteurizacion', width:17,align:'center', search:false},
            {name:'Inicio&nbsp;Pasteurizacion',width:20,align:'center', search:false},
            {name:'Final&nbsp;Pasteurizacion', width:19,align:'center', search:false},
            {name:'Inicio&nbsp;Enfriamiento', width:18,align:'center', search:false},
            {name:'Final&nbsp;Enfriamiento', width:18,align:'center', search:false},
            {name:'Responsable&nbsp;Pasteurizacion', width:40,align:'center'},          
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