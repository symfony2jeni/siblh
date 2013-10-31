

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    
    tableToGrid("#listado_pasteurizaciones", {
        pager : '#pagerPasteurizaciones',
        rowNum:10, 
        gridview: true, 
        caption: "Pasteurizaciones Activas",
        
        
        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'Codigo&nbsp;Pasteurizacion',width:20,align:'center'},
            {name:'Fecha&nbsp;Pasteurizacion', width:40,align:'center'},
            {name:'Responsable&nbsp;Pasteurizacion', width:40,align:'center'},
            {name:'Acción', width:30,align:'center'}
   
        ]
    
    });
    jQuery("#listado_pasteurizaciones").jqGrid('sortGrid',"codigoPasteurizacion",true);
    jQuery("#listado_pasteurizaciones").jqGrid('navGrid','#pagerPasteurizaciones', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});