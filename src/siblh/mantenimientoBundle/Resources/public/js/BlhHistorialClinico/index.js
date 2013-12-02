$(document).ready(function() {

 tableToGrid("#listado_hc", {
        pager : '#pagerhc',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:15,align:'center'},
            {name:'Nombre',width:15,align:'center'},
            {name:'Amenorrea',width:15,align:'center', search:false},
            {name:'Control&nbsp;prenatal', width:20,align:'center', search:false},
            {name:'Lugar&nbsp;de&nbsp;control', width:15,align:'center', search:false},
            {name:'Numero&nbsp;de&nbsp;controles', width:20,align:'center', search:false},
            {name:'Fecha&nbsp;ultima&nbsp;regla', width:15,align:'center', search:false},
            {name:'Fecha&nbsp;de&nbsp;parto',width:15,align:'center', search:false},
            {name:'Lugar&nbsp;de&nbsp;parto', width:15,align:'center', search:false},
            {name:'Patologia', width:15,align:'center', search:false},
            {name:'Periodo&nbsp;intergenesico', width:20,align:'center', search:false},
            {name:'Parto&nbsp;anterior', width:15,align:'center', search:false},
            {name:'Formula&nbsp;obstetrica', width:20,align:'center', search:false},
            {name:'Accion', width:10,align:'center'}
           
            
   
        ],
    
    });
    jQuery("#listado_hc").jqGrid('sortGrid',"id",true);
    jQuery("#listado_hc").jqGrid('navGrid','#pagerhc', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
    jQuery("#listado_hc").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });