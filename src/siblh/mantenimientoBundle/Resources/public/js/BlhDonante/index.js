$(document).ready(function() {
    
  /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/prueba/Prueba/pdf";
       window.open(url,'_blank');
       return false;
    }); */

 tableToGrid("#listado_donantes", {
        pager : '#pagerdonantes',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre', width:30,align:'center'},
            {name:'Fecha&nbsp;Nacimiento',width:20,align:'center'},
            {name:'Fecha&nbsp;de&nbsp;registro', width:20,align:'center'},
            {name:'Telefono&nbsp;fijo', width:15,align:'center'},
            {name:'Celular', width:10,align:'center'},
             {name:'Direccion', width:15,align:'center'},
            {name:'Procedencia', width:15,align:'center'},
            {name:'Registro', width:10,align:'center'},
            {name:'Documento&nbsp;de&nbsp;identificacion', width:40,align:'center'},
            {name:'Numero&nbsp;de&nbsp;documento',width:15,align:'center'},
            {name:'Edad', width:15,align:'center'},
            {name:'Ocupacion', width:15,align:'center'},
            {name:'Estado&nbsp;civil', width:10,align:'center'},
            {name:'Nacionalidad',width:15,align:'center'},
            {name:'Escolaridad', width:15,align:'center'},
            {name:'Tipo&nbsp;de&nbsp;colecta', width:15,align:'center'},
            {name:'Observaciones', width:40,align:'center'},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_donantes").jqGrid('sortGrid',"id",true);
    jQuery("#listado_donantes").jqGrid('navGrid','#pagerdonantes', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
    
    
    
    
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