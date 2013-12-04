$(document).ready(function() {
     $.noConflict();
       
   $( "#exportar_pdf13" ).button();  
      
    $('#exportar_pdf13').click(function() {
         $ide= $('#id').val();
     //    $blh= $('#id2').val();   
    //    $bl=  $blh.slice(0,12);
   
      if ($ide == "")
            
           { alert("Debe digitar un codigo"); }
        
        else
            {
        
        
    // alert(typeof $('#nombre').val());
         url = Routing.generate('_DDonante') + '/DonacionesDonante/pdf?id=' + $('#id').val() + '&nombre=' + $('#nombre').val() + '&id2=' + $('#id2').val();
            window.open(url, '_blank');
            return false;
        
            }
   });
   });