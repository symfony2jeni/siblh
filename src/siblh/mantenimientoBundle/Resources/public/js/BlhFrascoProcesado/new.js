$(document).ready(function() { 
 //url = Routing.generate('blhfrascoprocesado_create');
//GRID para listado de frascos a combinar//
  tableToGrid("#frascosCombinar", {
       
        pager : '#pagerfrascosCombinar',
        rowNum:10, 
        gridview: true,
        multiselect:true,
        sortname: 'Código&nbsp;Frasco',
        sortOrder: 'desc',     
       // height:'100%',
        //width:1400,
        caption: "Seleccione los frascos a combinar",
        cellEdit: true,
        mtype: 'POST',
        editurl:'siblhmantenimientoBundle::BlhFrascoProcesado.php',
        Cellsubmit:'local',
        
        colModel :[
            {name:'id',width:15,align:'center'},
            {name:'Código&nbsp;Frasco',width:15,align:'center'},
            {name:'Acidez', width:15,align:'center'},
            {name:'Volumen&nbsp;a&nbsp;combinar', width:15,align:'center', editable:true, editrules:{number:true},sorttype:'number',formatter:'number', numberfmt:''}            
        ]
        
    });
  //  jQuery("#frascosLote").jqGrid('sortGrid',"Código&nbsp;Frasco",true);
    jQuery("#frascosCombinar").jqGrid('navGrid','#pagerfrascosCombinar',{add:false,del:false,edit:false,position:'right'});              
jQuery("#lote").on ('click', function() {        
        var corr_seleccionados = jQuery("#frascosCombinar").jqGrid('getGridParam','selarrrow');
	var todos_id = jQuery("#frascosCombinar").jqGrid('getCol','id');      
        var total_filas = jQuery("#frascosCombinar").jqGrid('getDataIDs');
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

