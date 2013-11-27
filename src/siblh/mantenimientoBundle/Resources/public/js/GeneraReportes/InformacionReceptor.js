$(document).ready(function() {
     $.noConflict();
       
   $( "#exportar_pdf12" ).button();  
      
    $('#exportar_pdf12').click(function() {
         $ide= $('#id').val();
            
   
      if ($ide == "")
            
           { alert("Debe digitar un codigo"); }
        
        else
            {
        
        
    // alert(typeof $('#nombre').val());
         url = Routing.generate('_IReceptor') + '/InformacionReceptor/pdf?id=' + $('#id').val() + '&nombre=' + $('#nombre').val() + '&id2=' + $('#id2').val();
            window.open(url, '_blank');
            return false;
        
            }
   });
   });