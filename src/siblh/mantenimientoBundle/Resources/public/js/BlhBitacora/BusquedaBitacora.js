$(document).ready(function() {
    
    
      $('#nombreUser').
            attr('data-bvalidator', 'required'); 
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
     
     
    $( "#forma_busqueda" )
.change(function () {
var str = "";
$( "#forma_busqueda option:selected" ).each(function() {
str += $( this ).text();
});
//$( "div" ).text( str );
//alert(str);
if (str=="Nombre de usuario")
    {
        //alert("Busqueda por usuario");    
        document.getElementById("criterioFecha").style.display = "none";
        document.getElementById("criterioFecha2").style.display = "none";
        document.getElementById("criterioFecha3").style.display = "none";
        document.getElementById("criterioFecha4").style.display = "none";
        document.getElementById("criterioNombre").style.display = "block";
        document.getElementById("criterioNombre2").style.display = "block";

    }
  else if(str=="Periodo de fechas")
  {
        document.getElementById("criterioNombre").style.display = "none";
        document.getElementById("criterioNombre2").style.display = "none";
        document.getElementById("criterioFecha").style.display = "block";
        document.getElementById("criterioFecha2").style.display = "block";
        document.getElementById("criterioFecha3").style.display = "block";
        document.getElementById("criterioFecha4").style.display = "block";
  }
  
  $('#opcionSeleccionada').val($(this).val());
}).change();
 
   




$('#exportar_pdf3').click(function() {
        
     $fi= $('#fechai').val();
     $ff= $('#fechaf').val();
     $n1 = $('#nombreUser').val();
     $tipoBusqueda = $('#forma_busqueda').val();
     
     $error = false;
     
      if ((($fi === "") || ($ff === "") || ($ff < $fi)) && $tipoBusqueda == 2 )
            
           { alert("Debe seleccionar un rango de fecha valido"); 
           $error = true;}
        
      if ($tipoBusqueda == 1 && $n1 === "")
            {
                 alert("Debe digitar el nombre del usuario a buscar"); 
                 $error = true;       
                        
             }

        if ($error===false)
        {
            url = Routing.generate('blhbitacora');
            window.open(url, '_blank');
            return false;
            
        }
      return false;
       
   });



    
   });
