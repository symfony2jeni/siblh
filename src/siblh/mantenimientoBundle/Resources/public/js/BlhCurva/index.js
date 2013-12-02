/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

    
    tableToGrid("#listado_curvas", {
        pager : '#pagerCurvas',
        rowNum:10, 
        gridview: true, 
        caption: "Curva de Pentracion",
        
        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'Valor&nbsp;Curva', width:20,align:'center', search:false},
            {name:'Fecha&nbsp;Curva', width:20,align:'center'},
            {name:'Cantidad&nbsp;Frascos', width:20,align:'center'},
            {name:'Volumen&nbsp;Frascos', width:20,align:'center'},
            {name:'Acción', width:20,align:'center', search:false}
        ]
    });
    jQuery("#listado_curvas").jqGrid('sortGrid',"Id",true);
    jQuery("#listado_curvas").jqGrid('navGrid','#pagerCurvas', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
      jQuery("#listado_curvas").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});



