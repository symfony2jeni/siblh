

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    
    tableToGrid("#listado_pasteurizados", {
        pager : '#pagerPasteurizados',
        rowNum:10, 
        gridview: true, 
        caption: "Pasteurizaciones Activas",
        
        
        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'Codigo&nbsp;Frasco',width:20,align:'center'},
            {name:'Observacion', width:40,align:'center', search:false},
            {name:'Acción', width:30,align:'center', search:false}
   
        ]
    
    });
    jQuery("#listado_pasteurizados").jqGrid('sortGrid',"Codigo&nbsp;Frasco",true);
    jQuery("#listado_pasteurizados").jqGrid('navGrid','#pagerPasteurizados', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    jQuery("#listado_pasteurizados").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});