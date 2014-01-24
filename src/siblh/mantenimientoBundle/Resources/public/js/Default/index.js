 $(document).ready(function($) { 
    
   /* $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/alertaprealmacenado/AlertaPrealmacenado/pdf";
       window.open(url,'_blank');
       return false;
    });
    
    $('#reporte2').click(function(){
      var url="/app_dev.php/reportes/reporte/alertapasteurizado/AlertaPasteurizado/pdf";
       window.open(url,'_blank');
       return false;
    });*/
    
 //$x=0;
 


 $y = $('#2').val();
//$x=0;
 if($y>0)
 {
 $(function() {
    $( "#dialog-message2" ).dialog({
      modal: true,
   position: ['left', 570],
   autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "fade",
        duration: 1000
      },    
  
      buttons: {
        Ver: function() {
           window.open("/app_dev.php/reportes/reporte/alertapasteurizado/AlertaPasteurizado/pdf",'_blank');
        }
      }
    });
  });
 }
    
    /////////////////////////
      $x = $('#1').val();
 //$x=0;
 if($x>0)
     {
    //  $.noConflict();         
  $(function() {
      
    $( "#dialog-message" ).dialog({
      modal: true,
      position: ['left', 190],

 autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "fade",
        duration: 1000
      },     
      
      buttons: {
          
        Ver: function() {
            window.open("/app_dev.php/reportes/reporte/alertaprealmacenado/AlertaPrealmacenado/pdf",'_blank');;
        }
      }
    });
  });
         
         
//window.open("/app_dev.php/pacientes/");  



      
     }

     
     //prueba------------------------------------//
     //  $.noConflict(); 
   
     	$('#slidorion').slidorion({
		speed: 2000,
		interval: 9000,
		effect: 'slideLeft'
	});
     
     
     
	
     });