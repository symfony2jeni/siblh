/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

    
    tableToGrid("#listado_AnalisisMicro", {
        pager : '#pagerAnalisisMicro',
        rowNum:10,
	rownumbers: true,
	height:'100%', 
        gridview: true, 
        caption: "Analisis Microbiologicos",
        
        
        colModel :[
            {name:'Codigo', width:20,align:'center'},
            {name:'ColiformesTotales', width:20,align:'center',search:false},
            {name:'Control', width:20,align:'center',search:false},
            {name:'Situacion', width:20,align:'center'},
            {name:'Acción', width:20,align:'center',search:false}
        ] 
    });
    jQuery("#listado_AnalisisMicro").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_AnalisisMicro").jqGrid('navGrid','#pagerAnalisisMicro', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_AnalisisMicro").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});
