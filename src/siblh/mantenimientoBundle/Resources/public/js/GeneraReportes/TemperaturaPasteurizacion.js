$(document).ready(function() {
    
  /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/prueba/Prueba/pdf";
       window.open(url,'_blank');
       return false;
    }); */
     $.noConflict();
     
  
     
    
   $( "#exportar_pdf5" ).button();  
      
    $('#exportar_pdf5').click(function() {
      //  $x=$('#fechai').val();
   // alert ($x);
         // if ($('.ui-paging-info').text() != 'Sin registros que mostrar') {
                  //  $.noConflict();
                   $micadena=String($('#codigo').val());
                  console.log($micadena);
          url = Routing.generate('_exportar_reporte_Tpasteurizacion') + '/TemperaturaPasteurizacion/pdf?codigo=' + $micadena;
         // url = Routing.generate('_exportar_reporte') + '/Prueba/pdf?fechai=' + $('#fechai').val();  
        window.open(url, '_blank');
           return false;
           //  }
//      else {
  //         return false;
    //   }
       
      
       
   });
   });