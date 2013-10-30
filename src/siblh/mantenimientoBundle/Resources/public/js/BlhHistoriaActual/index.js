//src/siblh/mantenimientoBundle/Resource/public/js/entidades/index.js
$(document).ready(function() { 
	tableToGrid("#listado_ha", {
        pager : '#pagerha',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Peso',width:10,align:'center'},
            {name:'Talla', width:10,align:'center'},
            {name:'Medicamento', width:15,align:'center'},
            {name:'Habitotoxico', width:10,align:'center'},
            {name:'Motivodonacion', width:30,align:'center'},
             {name:'Patologiadonante', width:15,align:'center'},
            {name:'Imc', width:10,align:'center'},
            {name:'Estado&nbsp;donante', width:40,align:'center'},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_ha").jqGrid('sortGrid',"id",true);
    jQuery("#listado_ha").jqGrid('navGrid','#pagerha', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


$('#resultado').load(href, function(){
   $(this).dialog({
        modal: true, 
        width: 600
   })
});


$(document).ready(function() {
    $("h1").click(function(){
        $(this).css('color', 'red').fadeOut('slow').fadeIn('slow')    
    });
 
});
