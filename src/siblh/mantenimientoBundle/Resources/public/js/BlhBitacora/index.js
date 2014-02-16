$(document).ready(function() {
    
  /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/prueba/Prueba/pdf";
       window.open(url,'_blank');
       return false;
    }); */

 tableToGrid("#records_list", {
        pager : '#pagerbitacora',
        rowNum:20, 
	rownumbers: true,
        height: '100%',
        gridview: true, 
       caption: "Listado de bitacora",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Fecha&nbsp;Accion',width:20,align:'left'},
            {name:'Codigo', width:25,align:'center', search:false},
            {name:'Tabla',width:30,align:'center'},
            {name:'Usuario', width:17,align:'center', search:false},
            {name:'Accion', width:15,align:'center'},
            {name:'Detalle', width:200,align:'left', search:false}
           
            
   
        ],
    
    });
    jQuery("#records_list").jqGrid('sortGrid',"Codigo",true);
    jQuery("#records_list").jqGrid('navGrid','#pagerbitacora', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    
    jQuery("#records_list").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
    
    
    $('#exportar_pdf').click(function() {
        $x=$('#fechai').val();
    alert ($x);
          if ($('.ui-paging-info').text() != 'Sin registros que mostrar') {
                    $.noConflict();
          url = Routing.generate('_exportar_reporte') + '/Prueba/pdf?fechai=' + $('#fechai').val();
           window.open(url, '_blank');
           return false;
             }
      else {
           return false;
       }
       
      
       
   });
     });
