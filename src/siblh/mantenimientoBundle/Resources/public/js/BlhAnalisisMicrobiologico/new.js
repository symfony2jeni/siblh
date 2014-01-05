
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 $(document).ready(function() { 
     
      $.noConflict();                   
 
    $('#boton').button(); 
    $('#boton1').button(); 
    
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_red_', 
        lang: 'es'
    };
 
    //Validar el formulario
    
    $('form').bValidator(optionsRed);
         
       $('#boton').on ('click', function() {
           
       $coliformesTotales=$('#siblh_mantenimientobundle_blhanalisismicrobiologico_coliformesTotales').val();
       $situacion=$('#siblh_mantenimientobundle_blhanalisismicrobiologico_situacion').val();
       
        if($coliformesTotales == 'Positivo') {
            if($situacion !='Resiembra') {
            alert("Estados incorrectos !");
            return false;}
            }
        else
            {
              if($coliformesTotales == 'Negativo'){
            if($situacion !='Acepta') {    
                 alert("Estados incorrectos !");
            return false;}
                } 
              }
       });
 });
