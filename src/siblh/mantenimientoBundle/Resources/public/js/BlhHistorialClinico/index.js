$(document).ready(function() {

 tableToGrid("#listado_hc", {
        pager : '#pagerhc',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Amenorrea',width:15,align:'center'},
            {name:'Control&nbsp;prenatal', width:20,align:'center'},
            {name:'Lugar&nbsp;de&nbsp;control', width:15,align:'center'},
            {name:'Numero&nbsp;de&nbsp;controles', width:20,align:'center'},
            {name:'Fecha&nbsp;ultima&nbsp;regla', width:15,align:'center'},
            {name:'Fecha&nbsp;de&nbsp;parto',width:15,align:'center'},
            {name:'Lugar&nbsp;de&nbsp;parto', width:15,align:'center'},
            {name:'Patologia', width:15,align:'center'},
            {name:'Periodo&nbsp;intergenesico', width:20,align:'center'},
            {name:'Parto&nbsp;anterior', width:15,align:'center'},
            {name:'Formula&nbsp;obstetrica', width:20,align:'center'},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_hc").jqGrid('sortGrid',"id",true);
    jQuery("#listado_hc").jqGrid('navGrid','#pagerhc', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });