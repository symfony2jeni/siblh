/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 $(document).ready(function() { 
     
      $.noConflict();                   
 
    $('#boton').button(); 
    $('#boton1').button(); 

         
         //Validando estados.
       $('#boton').on ('click', function() {
           
       $coliformesTotales=$('#siblh_mantenimientobundle_blhanalisismicrobiologico_coliformesTotales').val();
       $situacion=$('#siblh_mantenimientobundle_blhanalisismicrobiologico_situacion').val();
       $control=$('#siblh_mantenimientobundle_blhanalisismicrobiologico_control').val();
       
        if($coliformesTotales == 'Negativo') 
        {
              if(($situacion !='Acepta')||($control !='N/A')) 
              
                 {alert("Estados incorrectos !");
                 return false;}
              else 
                 {
                   if(($situacion =='Acepta')&&($control =='N/A')) 
                      {alert("Frasco liberado !");
                      }
                 }
        }
        else
            {
               if($coliformesTotales == 'Positivo')
               {
                 if(($situacion =='Rechaza')&&($control =='Positivo'))
                    {alert("Frasco descartado por resiembra !");
                    }
                else 
                   { 
                     if(($situacion =='Acepta')&&($control =='Negativo')) 
                       {alert("Frasco liberado!");
                       }
                     else 
                       {
                        if(($situacion =='Resiembra')&&($control =='N/A')) 
                          {alert("Frasco a Resiembra!");
                          }   
                          else 
                             {
                              if(($situacion =='Resiembra')&&($control !='N/A')) 
                                 {alert("Estados incorrectos!");
                                 return false;}
                              else
                                 { 
                                  if(($situacion =='Rechaza')&&($control !='Positivo')) 
                                     {alert("Estados incorrectos!");
                                     }
                                     else
                                         {
                                           if(($situacion =='Acepta')&&($control !='Negativo')) 
                                              {alert("Estados incorrectos!");
                                               }
                                         }
                                  
                                 }

                            }
                           
                           
                       }
              
                   } 
                } 
            
             
             }
       });
 });