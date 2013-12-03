
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

    
    tableToGrid("#listado_archivos", {
        pager : '#pagerArchivos',
        rowNum:10, 
        gridview: true, 
        caption: "Documentos Subidos",

        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'TipoDocumento', width:20,align:'center'},
            {name:'NombreDocumento', width:20,align:'center'},
            {name:'FechaPublicacion', width:20,align:'center'},
            {name:'Acción', width:20,align:'center',search:false}
        ]
    });
    jQuery("#listado_archivos").jqGrid('sortGrid',"Id",true);
    jQuery("#listado_archivos").jqGrid('navGrid','#pagerArchivos', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    jQuery("#listado_archivos").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});