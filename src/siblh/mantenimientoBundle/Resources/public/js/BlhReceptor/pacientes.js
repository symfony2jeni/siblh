$(document).ready(function() {

 tableToGrid("#listado_pacientes", {
        pager : '#pagerpacientes',
        rowNum:20, 
        height:300,
        gridview: true, 
        caption: "Seleccione el paciente",
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'id',width:5,align:'center', search:false},
            {name:'Nombre', width:40,align:'left'},
             {name:'Accion', width:10,align:'center', search:false},
           
            
   
        ],
    
    });
    jQuery("#listado_pacientes").jqGrid('sortGrid',"id",true);
    jQuery("#listado_pacientes").jqGrid('navGrid','#pagerpacientes', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_pacientes").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });