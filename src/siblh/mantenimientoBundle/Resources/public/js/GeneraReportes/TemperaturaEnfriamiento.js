$(document).ready(function() {
      
     $.noConflict(); 
     $( "#exportar_pdf6" ).button();  
      
    $('#exportar_pdf6').click(function() {
         $ide= $('#id').val();
            
   
      if ($ide == "")
            
           { alert("Debe digitar un codigo"); }
        
        else
            {
        
         url = Routing.generate('_exportar_reporte_Tenfriamiento') + '/TemperaturaEnfriamiento/pdf?id=' + $('#id').val() + '&nombre=' + $('#nombre').val() + '&identificador=' + $('#identificador').val();
          window.open(url, '_blank');
           return false;
            }
       
   });
   });