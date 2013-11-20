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
            {name:'Fecha&nbsp;de&nbsp;registro', width:15,align:'center'},
            {name:'Procedencia',width:20,align:'center'},
            {name:'Estado&nbsp;de&nbsp;receptor', width:10,align:'center'},
            {name:'Edad&nbsp;en&nbsp;dias', width:15,align:'center'},
            {name:'Pesoreceptor', width:10,align:'center'},
             {name:'Duracioncpap', width:15,align:'center'},
            {name:'Clasificacion&nbsp;lubchengo', width:15,align:'center'},
            {name:'Diagnostico&nbsp;de&nbsp;ingreso', width:10,align:'center'},
            {name:'Duracio&nbsp;nnpt', width:10,align:'center'},
            {name:'Apgar',width:15,align:'center'},
            {name:'Edadgest&nbsp;fur', width:15,align:'center'},
            {name:'Duracionventilacion', width:15,align:'center'},
            {name:'Edadgest&nbsp;ballard', width:10,align:'center'},
            {name:'Pc',width:15,align:'center'},
            {name:'Talla&nbsp;de&nbsp;ingreso', width:15,align:'center'},
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