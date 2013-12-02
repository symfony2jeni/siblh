$(document).ready(function($) { 
    
    $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/alertaprealmacenado/AlertaPrealmacenado/pdf";
       window.open(url,'_blank');
       return false;
    });
    
    $('#reporte2').click(function(){
      var url="/app_dev.php/reportes/reporte/alertapasteurizado/AlertaPasteurizado/pdf";
       window.open(url,'_blank');
       return false;
    });
    
 //$x=0;
 
  $x = $('#1').val();
 //$x=0;
 if($x>0)
     {
    //  $.noConflict();         
  $(function() {
      
    $( "#dialog-message" ).dialog({
      modal: false,
      position: ['left', 405],

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
          
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
         
         
//window.open("/app_dev.php/pacientes/");  



      
     }

 $y = $('#2').val();
 //$x=0;
 if($y>0)
 {
 $(function() {
    $( "#dialog-message2" ).dialog({
      modal: false,
   position: ['right', 405],
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
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
 }
    

     
     //prueba------------------------------------//
     //  $.noConflict(); 
   
     	$('#slidorion').slidorion({
		speed: 2000,
		interval: 9000,
		effect: 'slideLeft'
	});
     
     
     
	
     });