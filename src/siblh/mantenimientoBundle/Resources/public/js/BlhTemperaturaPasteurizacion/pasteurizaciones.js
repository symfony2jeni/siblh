

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    
    tableToGrid("#listado_pasteurizaciones", {
        pager : '#pagerPasteurizaciones',
        rowNum:10, 
	rownumbers: true,
        gridview: true, 
        caption: "Pasteurizaciones Activas",
        height:'100%',
        width:800,
        
        
        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'Codigo',width:15,align:'center'},
            {name:'Fecha', width:20,align:'center'},
            {name:'Responsable&nbsp;Pasteurizacion', width:40,align:'center', search:false},
            {name:'Acción', width:15,align:'center', search:false}
   
        ]
    
    });
    jQuery("#listado_pasteurizaciones").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_pasteurizaciones").jqGrid('navGrid','#pagerPasteurizaciones', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    jQuery("#listado_pasteurizaciones").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});
