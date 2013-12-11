

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    
    tableToGrid("#listado_pasteurizados", {
        pager : '#pagerPasteurizados',
        rowNum:10,
	rownumbers: true, 
        gridview: true, 
        caption: "Pasteurizaciones Activas",
        height:'100%',
        width:1000,
        
        
        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'Frasco',width:15,align:'center'},
            {name:'Observacion', width:40,align:'center', search:false},
            {name:'Acción', width:15,align:'center', search:false}
   
        ]
    
    });
    jQuery("#listado_pasteurizados").jqGrid('sortGrid',"Frasco",true);
    jQuery("#listado_pasteurizados").jqGrid('navGrid','#pagerPasteurizados', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    jQuery("#listado_pasteurizados").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});
