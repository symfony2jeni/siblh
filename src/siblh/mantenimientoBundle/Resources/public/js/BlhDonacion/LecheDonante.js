$(document).ready(function() { 
    

    
 
//window.open("/app_dev.php/pacientes/");  

    
     $.noConflict();
	tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
        height: '100%',
	width:800, 
        gridview: true, 
       caption: "Listado de donantes",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre', width:30,align:'center'},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_donantes").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_donantes").jqGrid('navGrid','#pagerdonantes', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true
    });
    
jQuery("#listado_donantes").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     
  
     
     
      });
