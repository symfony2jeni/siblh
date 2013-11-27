$(document).ready(function() {
    
  /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/prueba/Prueba/pdf";
       window.open(url,'_blank');
       return false;
    }); */
     $.noConflict();
     
     $(function() {
    $( "#fechai" ).datepicker({ dateFormat: 'yy-mm-dd',
       changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '2012-10-01',
                           maxDate: 'today',
                          //yearRange: '-35y:-13y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
    });  
    
     $( "#fechaf" ).datepicker({ dateFormat: 'yy-mm-dd',
       changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '2012-10-01',
                           maxDate: 'today',
                          //yearRange: '-35y:-13y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
    });
  });
     
    
   $( "#exportar_pdf14" ).button();  
      
    $('#exportar_pdf14').click(function() {
     $fi= $('#fechai').val();
     $ff= $('#fechaf').val();          
    
      if (($fi == " ") || ($ff == " "))
            
           { alert("Debe seleccionar un rango de fecha"); }
        
        else
            {

          url = Routing.generate('_exportar_reporte_leche') + '/LecheDespachadaSolicitudes/pdf?fechai=' + $('#fechai').val() + '&fechaf=' + $('#fechaf').val()+ '&id=' + $('#id').val()+ '&nombre=' + $('#nombre').val();
         // url = Routing.generate('_exportar_reporte') + '/Prueba/pdf?fechai=' + $('#fechai').val();  
        window.open(url, '_blank');
           return false;
           }

       
   });
   });