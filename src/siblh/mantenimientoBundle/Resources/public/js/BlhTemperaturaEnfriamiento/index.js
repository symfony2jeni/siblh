$(document).ready(function() {
    
   
 tableToGrid("#listado_temperaturas", {
        pager : '#pagertemperaturas',
        rowNum:10,
	rownumbers: true, 
        height: '100%',
        gridview: true, 
        width: 700,
        caption: "Temperaturas",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:130,align:'center'},
            {name:'FechaPasteurizacion', width:130,align:'center'},
            {name:'Temperatura',width:110,align:'center',search:false},
            {name:'Accion', width:70,align:'center',search:false}
           
            
   
        ]
    
    });
    jQuery("#listado_temperaturas").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_temperaturas").jqGrid('navGrid','#pagertemperaturas', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
     jQuery("#listado_temperaturas").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
     });