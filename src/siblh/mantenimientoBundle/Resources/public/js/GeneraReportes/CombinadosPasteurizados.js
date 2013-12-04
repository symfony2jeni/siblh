$(document).ready(function() {
      
     $.noConflict(); 
     $( "#exportar_pdf15" ).button();  
      
    $('#exportar_pdf15').click(function() {
         $ide= $('#id').val();
            
   
      if ($ide == "")
            
           { alert("Debe digitar un codigo"); }
        
        else
            {
        
         url = Routing.generate('_exportar_reporte_cpasteurizados') + '/CombinadosPasteurizados/pdf?id=' + $('#id').val() + '&nombre=' + $('#nombre').val();
          window.open(url, '_blank');
           return false;
            }
       
   });
   });