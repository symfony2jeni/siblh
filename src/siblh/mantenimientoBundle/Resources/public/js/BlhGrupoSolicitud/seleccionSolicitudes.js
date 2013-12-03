$(document).ready(function() {
         $.noConflict();
        $("#agrupar").button();
        tableToGrid("#Multiselect",{
   	colModel:[
   		{name:'id',index:'id', width:10, align:'Center', hidden:true},
   		{name:'Codigo',index:'Codigo', width:25, align:'Center'},
   		{name:'Fecha',index:'Fecha', width:25, align:'Center'},
   		{name:'Receptor',index:'Receptor', width:80, align:'Center'},		
   		{name:'Acidez',index:'Acidez', width:15, align:'Center'},		
   		{name:'Calorias',index:'Calorias', width:15, align:'Center'},	
                {name:'Volumen&nbsp;por&nbsp;toma',index:'Volumen&nbsp;por&nbsp;toma', width:25, align:'Center'},
                {name:'Tomas&nbsp;por&nbsp;dia',index:'Tomas&nbsp;por&nbsp;dia', width:25, align:'Center'}
   	],
   	rowNum:10,
        gridview: false, 
   	//pager: '#pagerMultiselect',
   	sortname: 'id',
        viewrecords: false,
        sortorder: "desc",
	multiselect: true,
	caption: "Seleccione las solicitudes a agrupar",
        height:'100%',
        width:1100
});


//jQuery("#Multiselect").jqGrid('sortGrid',"Nombres",true);
//jQuery("#Multiselect").jqGrid('navGrid','#pagerMultiselect',{add:false,del:false,edit:false,search:false, reload: false});
jQuery("#agrupar").on ('click', function() {
        
        var corr_seleccionados = jQuery("#Multiselect").jqGrid('getGridParam','selarrrow');
	var todos_id = jQuery("#Multiselect").jqGrid('getCol','id');      
        var total_filas = jQuery("#Multiselect").jqGrid('getDataIDs');
        var s = new Array();
      
    
        if (corr_seleccionados.length > 4 || corr_seleccionados.length === 0){
            if (corr_seleccionados.length === 0){
                alert('No se han seleccionado solicitudes para agrupar');
                 //$('#var').val(0);
                 return false;
            }
            else{
             alert("Solo puede elegir como maximo 4 solicitudes por grupo"); }//fin else interno  
             //$('#var').val(0);
             return false;
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