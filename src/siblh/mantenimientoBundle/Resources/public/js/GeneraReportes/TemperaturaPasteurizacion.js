$(document).ready(function() {
     $.noConflict();
       
   $( "#exportar_pdf5" ).button();  
      
    $('#exportar_pdf5').click(function() {
         $ide= $('#id').val();
            
   
      if ($ide == "")
            
           { alert("Debe digitar un codigo"); }
        
        else
            {
        
        
    // alert(typeof $('#nombre').val());
         url = Routing.generate('_TPasteurizacion') + '/TemperaturaPasteurizacion/pdf?id=' + $('#id').val() + '&nombre=' + $('#nombre').val() + '&identificador=' + $('#identificador').val();
            window.open(url, '_blank');
            return false;
        
            }
   });
   });