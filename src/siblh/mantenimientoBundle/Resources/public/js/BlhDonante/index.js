$(document).ready(function() {
    
  /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/prueba/Prueba/pdf";
       window.open(url,'_blank');
       return false;
    }); */

 tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
	rownumbers: true,
        height: '100%',
        gridview: true, 
       caption: "Listado de donantes",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre', width:30,align:'center'},
            {name:'Fecha&nbsp;Nacimiento',width:17,align:'center', search:false},
            {name:'Fecha&nbsp;de&nbsp;registro', width:17,align:'center', search:false},
            {name:'Telefono&nbsp;fijo', width:15,align:'center', search:false},
            {name:'Procedencia', width:15,align:'center', search:false},
            {name:'Registro', width:12,align:'center', search:false},
            {name:'Documento', width:14,align:'center', search:false},
            {name:'Numero&nbsp;de&nbsp;documento',width:25,align:'center', search:false},
            {name:'Edad', width:5,align:'center', search:false},
            {name:'Ocupacion', width:15,align:'center', search:false},
            {name:'Estado&nbsp;civil', width:10,align:'center', search:false},
            {name:'Nacionalidad',width:15,align:'center', search:false},
            {name:'Escolaridad', width:15,align:'center', search:false},
            {name:'Tipo&nbsp;de&nbsp;colecta', width:15,align:'center', search:false},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_donantes").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_donantes").jqGrid('navGrid','#pagerdonantes', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    
    jQuery("#listado_donantes").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
    
    
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
