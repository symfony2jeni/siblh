$(document).ready(function() { 
//GRID para listado de frascos//
  tableToGrid("#frascosLote", {
        pager : '#pagerfrascosLoter',
        rowNum:10, 
        gridview: true,
        multiselect:true,
       // height:'100%',
        //width:1400,
        caption: "Seleccione los frascos a analizar en lote",
        colModel :[
            {name:'id',width:15,align:'center'},
            {name:'Código&nbsp;Frasco',width:15,align:'center'},
            {name:'Volumen&nbsp;Recolectado(ml)', width:15,align:'center'},
            {name:'Volumen&nbsp;Recolectado(onz)', width:15,align:'center'},
            {name:'Forma&nbsp;Extracción', width:15,align:'center'}, 
            {name:'Observaciones', width:35,align:'center'}, 
            
    
        ],
       
    });
    jQuery("#frascosLote").jqGrid('sortGrid',"id",true);
    jQuery("#frascosLote").jqGrid('navGrid','#frascosLote', {
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
      
    
        if (corr_seleccionados.length > 4 || corr_seleccionados.length === 0){
            if (corr_seleccionados.length === 0){
                alert('No se ha selelcionado ninguna solicitud para agrupar');
               
                 $('#var').val(0);
            }
            else{
             alert("Solo puede elegir como maximo 4 solicitudes por grupo"); }//fin else interno  
             
             $('#var').val(0);
            }//final if interno
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


