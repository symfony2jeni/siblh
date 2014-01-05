/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() { 
    $.noConflict();
   $('#boton').button();
   $('#boton1').button();

      
     $.datepicker.setDefaults($.datepicker.regional["es"]);
   $('input[id$="_fechaCurva"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           minDate:'todate',
                           maxDate: 'todate',
                           clearStatus: 'Borra fecha actual',  
                           //defaultDate: '01-01-2012',
                           yearRange: '2013:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });
 

 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
 
 //Calculando campos                        
var $tiempo1; 
var $tiempo2; 
var $tiempo3;  
var $valor1;
var $valorCurva;
  $('#siblh_mantenimientobundle_blhcurva_tiempo1').on('input', function() { 
    $tiempo1 = this.value;
});
 $('#siblh_mantenimientobundle_blhcurva_tiempo1').on('input', function() { 
    $tiempo1 = this.value;
});
$('#siblh_mantenimientobundle_blhcurva_tiempo2').on('input', function() { 
    $tiempo2 = this.value;
});
$('#siblh_mantenimientobundle_blhcurva_tiempo3').on('input', function() { 
    $tiempo3 = this.value;
    $valor1=parseInt($tiempo1)+parseInt($tiempo2)+parseInt($tiempo3);
    $valorCurva= Math.round(($valor1/3)* 100) / 100;  
});

$('#siblh_mantenimientobundle_blhcurva_valorCurva').on ('click', function() {
this.value = $valorCurva; } ); 


 
 
 
    //Validar el formulario
    
    $('form').bValidator(optionsRed);
    
    
    //funcion para presentacion de mensajes
    $(function() {
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
        
  });

   
    
    $('#boton').on ('click', function() {

       $fechaCurva=$('#siblh_mantenimientobundle_blhcurva_fechaCurva').val();
       $cantidadFrascos=$('#siblh_mantenimientobundle_blhcurva_cantidadFrascos').val();
       $volumenPorFrasco=$('#siblh_mantenimientobundle_blhcurva_volumenPorFrasco').val();
       $tiempo1=$('#siblh_mantenimientobundle_blhcurva_tiempo1').val();
       $tiempo2=$('#siblh_mantenimientobundle_blhcurva_tiempo2').val();
       $tiempo3=$('#siblh_mantenimientobundle_blhcurva_tiempo3').val();
       
        if($fechaCurva == "" ) {
            alert("Ingrese una fecha valida!");
            return false;}
        else{
            if(($cantidadFrascos == "") || ($cantidadFrascos < 10)  || ($cantidadFrascos > 60)) {
            alert("Ingrese cantidad de frascos entre 20 y 60!");
            return false;}
        
            else{
                if(($volumenPorFrasco == "") || ($volumenPorFrasco < 60)  || ($volumenPorFrasco > 500)) {
                alert("Ingrese Volumen de frascos entre 60 y 500 ML!");
                return false;} 
            
                 else{
                    if(($tiempo1 == "") || ($tiempo1 < 5)  || ($tiempo1>10)) {
                    alert("Ingrese tiempo entre 5 y 10 minutos!");
                    return false;}
                
                     else{
                        if(($tiempo2 == "") || ($tiempo2 < 5)  || ($tiempo2>10)) {
                        alert("Ingrese tiempo entre 5 y 10 minutos!");
                        return false;} 
                 
                        else{
                           if(($tiempo3 == "") || ($tiempo3 < 5)  || ($tiempo3>10)) {
                           alert("Ingrese tiempo entre 5 y 10 minutos!");
                            return false;} 
                        else {
                            alert("Datos almacenados!")
                             }

                             }
                         }
                      }
                }
            }
       
       });


  

});
    
function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum === 8)|| (keynum === 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
 
function soloNumerosEnteros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 
 
 
function soloTexto(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if (keynum === 8)
return true;
 
return /\d/.test(String.fromCharCode(keynum));
} 
  

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
