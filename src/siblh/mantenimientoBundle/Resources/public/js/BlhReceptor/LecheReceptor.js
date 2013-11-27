$(document).ready(function() { 
    

    
 
//window.open("/app_dev.php/pacientes/");  

    
     $.noConflict();
	tableToGrid("#listado_receptores", {
        pager : '#pagerreceptores',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:20,align:'center'},
            {name:'Nombre', width:15,align:'center'},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_receptores").jqGrid('sortGrid',"id",true);
    jQuery("#listado_receptores").jqGrid('navGrid','#pagerreceptores', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
    

     
  
     
     
      });