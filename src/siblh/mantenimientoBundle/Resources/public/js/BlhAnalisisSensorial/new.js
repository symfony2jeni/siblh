$(document).ready(function() { 
     //$('#button').button();
     $.noConflict();
  
    //Tooltip                      
 
        
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
  
       
    //Boton   
   
    $( "#boton" ).button();
     $( "#boton1" ).button();
      
    $('#siblh_mantenimientobundle_blhanalisissensorial_observacion').
            attr('data-bvalidator', 'required');
     $('#siblh_mantenimientobundle_blhanalisissensorial_embalaje').
            attr('data-bvalidator', 'required');
     $('#siblh_mantenimientobundle_blhanalisissensorial_suciedad').
            attr('data-bvalidator', 'required');
    $('#siblh_mantenimientobundle_blhanalisissensorial_color').
            attr('data-bvalidator', 'required');
    $('#siblh_mantenimientobundle_blhanalisissensorial_flavor').
            attr('data-bvalidator', 'required');


   
      
      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);

  //validando
  
  
$('#boton').on ('click', function() {
 
    
    $embalaje=$('#siblh_mantenimientobundle_blhanalisissensorial_embalaje').val();
    $suciedad=$('#siblh_mantenimientobundle_blhanalisissensorial_suciedad').val();
    $color=$('#siblh_mantenimientobundle_blhanalisissensorial_color').val();
    $olor=$('#siblh_mantenimientobundle_blhanalisissensorial_flavor').val();
 
 if(($embalaje=='')||($suciedad=='')||($olor=='')||($color=='')){//inicio if principal
 return true;
    }
 else{//else de if principal
 
 if($embalaje=='Reprobado'){//Inicio if embalaje reprobado
   if(($suciedad!='NR')||($color!='NR')||($olor!='NR')) {//if suciedad,color,olor != NR
       alert('Estados incorrectos');      
       return false; }
   else{//else suciedad,color,olor != NR
       if($suciedad=='Reprobado'){//if de suciedad == reprobado
           if(($color!='NR')||($olor!='NR')){//if color,olor != NR
               alert('Estados incorrectos');      
               return false; }
           else{//else de if color,olor != NR
               if($color=='Reprobado'){//if color = reprobado
                   if($olor!='NR'){alert('Estados incorrectos');      
               return false; }               
           }//fin de if color = reprobado
           else{//else color == reprobado
               if($olor=='NR'){alert('Estados incorrectos');//if color = NR      
               return false;}
               else{//else if, color =NR
                   if(($color!='Aprobado')||($suciedad!='Aprobado')||($embalaje!='Aprobado')){
                       alert('Estados incorrectos');//if color = NR      
                       return false;}
               }
               if(($embalaje!='Aprobado'||($suciedad!='Aprobado'))){
                   alert('Estados incorrectos');//if color = NR      
                   return false;
               }
           }//fin else color=reprobado
       }//fin de else, else de if color,olor != NR
       }//fin if de suciedad == reprobado
       else{//else suciedad=reprobado
           if($suciedad!='NR'){//inicio if suciedad != NR
           if($color=='NR'){ //if color==NR
               alert('Estados incorrectos');//if color = NR      
               return false;
           }//else color==NR
           else{//else color=NR
               if($color=='Reprobado'){//if color=reprobado
                   if($olor!='NR'){ 
                       alert('Estados incorrectos');//if color = NR      
                       return false;
                   }
               }//fin if color=reprobado
               else{//else color=reprobado
                   if($color!='NR'){ //if color =!NR
                       if($color=='NR'){alert('Estados incorrectos');      
                       return false;}
                   else{//else color=NR
                       if(($color!='Aprobado')||($suciedad!='Aprobado')||($embalaje!='Aprobado')){
                           alert('Estados incorrectos');      
                       return false;
                       }
                   }//fin else color=NR    
                   if(($embalaje!='Aprobado')||($suciedad!='Aprobado')){
                       alert('Estados incorrectos');//if color = NR      
                        return false;
                   }
                       
                   }// fin if color =! NR
               }//fin else color=reprobado  
           }//fin else color=NR
           }//fin if suciedad = NR
           
           
       }//FIN ELSE SUCIEDAD==REPROBADO
   }//fin else suciedad,color,olor != NR
    }//Fin cierto embalaje igual a reprobado
    else{//inicio else embalaje = reprobado
        if($suciedad=='NR'){//if suciedad==NR
            alert('Estados incorrectos');     
            return false;            
        }
        else{//else suciedad = NR
            if($suciedad=='Reprobado'){//if suciedad=reprobado
                if(($color!='NR')||($olor!='NR')){
                    alert('Estados incorrectos'); 
                        return false;
                }
                
            }//fin de if suciedad-reprobado
            else{//else suciedad=reprobado
                
                if($color=='NR'){alert('Estados incorrectos');//if color = NR      
                        return false;}
            else{//else color=NR
                if($color=='Reprobado'){//if color = reprobado   
                    if($olor!='NR'){alert('Estados incorrectos');  
                        return false;}
                }
                else{//else color==reprobado
                    if($olor=='NR'){alert('Estados incorrectos');//if olor=NR  
                        return false;}
                    else{//else olor=NR
                        if(($color!='Aprobado')||($suciedad!='Aprobado')||($embalaje!='Aprobado')){alert('Estados incorrectos');//if olor=NR  
                        return false;}
                        
                    }//fin else olor=NR
                 if(($embalaje!='Aprobado')||($suciedad!='Aprobado')){
                     alert('Estados incorrectos');
                        return false;
                 }   
                    
                }//fin else color ==reprobado
                if($embalaje!='Aprobado'){
                    alert('Estados incorrectos');
                        return false;
                }
            }//fin else color=NR      
                
            }
              
        }//fin else suciedad = NR
        
    }//fin else embalaje = reprobado 
    
 }//fin else principal
 
 
 //Mensaje de Estado del frasco
 if($embalaje=="Reprobado"){
     alert('Frasco descartado por embalaje');
 }
  if($suciedad=="Reprobado"){
     alert('Frasco descartado por suciedad');
 }
  if($color=="Reprobado"){
     alert('Frasco descartado por color');
 }
  if($olor=="Reprobado"){
     alert('Frasco descartado por olor');
 }
     
 } ); 
  
  
  
 


});



      



