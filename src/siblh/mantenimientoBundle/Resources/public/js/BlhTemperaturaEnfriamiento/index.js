$(document).ready(function() {
    
   
 tableToGrid("#listado_temperaturas", {
        pager : '#pagertemperaturas',
        rowNum:10, 
        height: '100%',
        gridview: true, 
        width: 300,
       
       // caption: "Seleccione la donante",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Temperatura',width:15,align:'center'},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_temperaturas").jqGrid('sortGrid',"id",true);
    jQuery("#listado_temperaturas").jqGrid('navGrid','#pagertemperaturas', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });