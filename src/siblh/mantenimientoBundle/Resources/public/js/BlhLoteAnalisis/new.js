$(document).ready(function() { 
    
     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
       //Calendario  
     $('input[id$="_fechaAnalisisFisicoQuimico"]').datepicker({ dateFormat: 'yy-mm-dd',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                           defaultDate: 'today',
                           minDate: '-7d',
                           maxDate: 'today',
                          // yearRange: '2012:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });  
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
    
      $( "#lote" ).button();
      
   //Spiner   
 $(function() {
    $( '#spinner' ).spinner({
      spin: function( event, ui ) {
        if ( ui.value > 50 ) {
          $( this ).spinner( "value", 0 );
          return false;
        } else if ( ui.value < 0 ) {
          $( this ).spinner( "value", 50 );
          return false;
        }
      }
    });
  });
  
   $('#siblh_mantenimientobundle_blhloteanalisis_fechaAnalisisFisicoQuimico').
            attr('data-bvalidator', 'required');

  $('#siblh_mantenimientobundle_blhloteanalisis_responsableAnalisis').
            attr('data-bvalidator', 'required');

    

      //Opciones del validador
    var optionsRed = {
        classNamePrefix: 'bvalidator_red_',
        lang: 'es'
    };

    //Validar el formulario
    $('form').bValidator(optionsRed);
  
//GRID para listado de frascos//
  tableToGrid("#frascosLote", {
        pager : '#pagerfrascosLote',
        //rowNum:10, 
        gridview: false,
        multiselect:true,
        sortname: 'Código',
        sortOrder: 'desc',
        height:'100%',
        width:900,
        caption: "Seleccione los frascos a analizar en lote",
        colModel :[
            {name:'id',width:10,align:'center', hidden:true, search:false},
            {name:'Código',width:15,align:'center'},
            {name:'Volumen(ml)', width:15,align:'center'},
            {name:'Volumen(onz)', width:15,align:'center'},
            {name:'Fecha&nbsp;Extracción', width:15,align:'center', search:false}            
        ]
       
    });
  //  jQuery("#frascosLote").jqGrid('sortGrid',"Código&nbsp;Frasco",true);
   /* jQuery("#frascosLote").jqGrid('navGrid','#pagerfrascosLote', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:true      
    });*/
    
//jQuery("#frascosLote").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
                          
jQuery("#lote").on ('click', function() {
        
        var corr_seleccionados = jQuery("#frascosLote").jqGrid('getGridParam','selarrrow');
	var todos_id = jQuery("#frascosLote").jqGrid('getCol','id');      
        var total_filas = jQuery("#frascosLote").jqGrid('getDataIDs');
        var s = new Array();
      
    
        if (corr_seleccionados.length < 15){
            
                alert('El numero de frascos para un lote debe ser mayor o igual que 15');
                return false;
                 //$('#var').val(0);
        }
            else{
           for(i= 0 ; i < corr_seleccionados.length ; i++){
            for(j = 0; j < total_filas.length ; j++){
                if (corr_seleccionados[i] === total_filas[j]){
                s[i] = todos_id[j]; 
            }//final if interno 
        }//final for externo
        }//fin de for externo
        $('#var').val(s);
        
       }//fin de else

	
});

 $('#responsable').on ('click', function() {
    $('#siblh_mantenimientobundle_blhloteanalisis_responsableAnalisis').val (this.value); 

    });
$('#lote').on ('click', function() {
    $aux = $('#siblh_mantenimientobundle_blhloteanalisis_responsableAnalisis').val();
   if($aux=='')
   {alert('Seleccione un responsable');
   return false;}
 
    
    });



});

 



