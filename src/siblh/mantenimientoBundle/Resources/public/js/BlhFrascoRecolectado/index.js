$(document).ready(function() {
    
    $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/lechedonada/LecheDonada/pdf";
       window.open(url,'_blank');
       return false;
    });
    

 tableToGrid("#listado_frascos", {
        pager : '#pagerfrascos',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Volumen&nbsp;Recolectado', width:15,align:'center'},
            {name:'Onzas&nbsp;Recolectadas', width:15,align:'center'},
            {name:'Forma&nbsp;de&nbsp;Extraccion', width:10,align:'center'},
            {name:'Observaciones', width:40,align:'center'},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_frascos").jqGrid('sortGrid',"id",true);
    jQuery("#listado_frascos").jqGrid('navGrid','#pagerfrascos', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });