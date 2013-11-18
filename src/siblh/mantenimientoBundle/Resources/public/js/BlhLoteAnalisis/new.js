$(document).ready(function() { 
     /*$('button').button();*/
     $.noConflict();
     $.datepicker.setDefaults($.datepicker.regional["es"]);
     
       //Calendario  
     $('input[id$="_fechaAnalisisFisicoQuimico"]').datepicker({ dateFormat: 'dd-mm-yy',  
                           changeMonth: true,
                           changeYear: true,
                           clearStatus: 'Borra fecha actual',  
                          defaultDate: '2012-01-01',
                            yearRange: '2012:y',
                           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                                             "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
                          });  
    //Tooltip                      
 
    $( document ).tooltip();
  
       
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
  
//GRID para listado de frascos//
  tableToGrid("#frascosLote", {
        pager : '#pagerfrascosLote',
        rowNum:10, 
        gridview: true,
        multiselect:true,
        sortname: 'Código&nbsp;Frasco',
        sortOrder: 'desc',
       // height:'100%',
        //width:1400,
        caption: "Seleccione los frascos a analizar en lote",
        colModel :[
            {name:'id',width:15,align:'center'},
            {name:'Código&nbsp;Frasco',width:15,align:'center'},
            {name:'Volumen&nbsp;Recolectado(ml)', width:15,align:'center'},
            {name:'Volumen&nbsp;Recolectado(onz)', width:15,align:'center'},
            {name:'Forma&nbsp;Extracción', width:15,align:'center'}, 
            {name:'Observaciones', width:35,align:'center'}                
        ]
       
    });
  //  jQuery("#frascosLote").jqGrid('sortGrid',"Código&nbsp;Frasco",true);
    jQuery("#frascosLote").jqGrid('navGrid','#pagerfrascosLote', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true      
    });
                          
jQuery("#lote").on ('click', function() {
        
        var corr_seleccionados = jQuery("#frascosLote").jqGrid('getGridParam','selarrrow');
	var todos_id = jQuery("#frascosLote").jqGrid('getCol','id');      
        var total_filas = jQuery("#frascosLote").jqGrid('getDataIDs');
        var s = new Array();
      
    
        if (corr_seleccionados.length === 0){
            
                alert('No se han seleccionado frascos para agregar al lote');
               
                 $('#var').val(0);
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

});




