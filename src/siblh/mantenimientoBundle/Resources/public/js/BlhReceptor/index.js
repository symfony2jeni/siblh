$(document).ready(function() { 
    
    $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/receptores/Receptores/pdf";
       window.open(url,'_blank');
       return false;
    });
    
 
//window.open("/app_dev.php/pacientes/");  

    
     $.noConflict();
	tableToGrid("#listado_receptores", {
        pager : '#pagerreceptores',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre',width:20,align:'center'},
            {name:'Fecha&nbsp;de&nbsp;registro', width:15,align:'center', search:false},
            {name:'Procedencia',width:20,align:'center', search:false},
            {name:'Estado&nbsp;de&nbsp;receptor', width:10,align:'center', search:false},
            {name:'Edad&nbsp;en&nbsp;dias', width:15,align:'center', search:false},
            {name:'Pesoreceptor', width:10,align:'center', search:false},
            {name:'Talla&nbsp;de&nbsp;ingreso', width:15,align:'center', search:false},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_receptores").jqGrid('sortGrid',"id",true);
    jQuery("#listado_receptores").jqGrid('navGrid','#pagerreceptores', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_receptores").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });