$(document).ready(function() {
    
  /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/prueba/Prueba/pdf";
       window.open(url,'_blank');
       return false;
    }); */

 tableToGrid("#listado_bancos", {
        pager : '#pagerbancos',
        rowNum:10, 
        width: 700,
        gridview: true, 
       // caption: "Seleccione la donante",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Establecimiento', width:60,align:'center'},
            {name:'Estado',width:10,align:'center', search:false},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_bancos").jqGrid('sortGrid',"id",true);
    jQuery("#listado_bancos").jqGrid('navGrid','#pagerbancos', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    
    jQuery("#listado_bancos").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 

     });