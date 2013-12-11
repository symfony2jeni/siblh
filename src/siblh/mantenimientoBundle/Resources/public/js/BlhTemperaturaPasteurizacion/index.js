/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    
    tableToGrid("#listado_temperaturas", {
        pager : '#pagerTemperaturaP',
        rowNum:10,
	rownumbers: true,
	height:'100%', 
	width:700,
        gridview: true, 
        caption: "Temperaturas",
        colModel :[
           // {name:'id',width:10,editable:true},
            {name:'CodigoPasteurizacion',width:130,align:'center'},
            {name:'FechaPasteurizacion', width:130,align:'center'},
            {name:'TemperaturaPasteurizacion', width:130,align:'center',search:false},
            {name:'Acción', wdth:15,align:'center',search:false}
        ]
    });
    jQuery("#listado_temperaturas").jqGrid('sortGrid',"CodigoPasteurizacion",true);
    jQuery("#listado_temperaturas").jqGrid('navGrid','#pagerTemperaturaP', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_temperaturas").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
});
