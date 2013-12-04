$(document).ready(function() {

 tableToGrid("#listado_hc", {
        pager : '#pagerhc',
        rowNum:10, 
      //  width: 800,
       height: '100%',
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:20,align:'center'},
            {name:'Nombre',width:30,align:'center'},
            {name:'Amenorrea',width:13,align:'center', search:false},
            {name:'Ultima&nbsp;Regla', width:15,align:'center', search:false},
            {name:'Fecha&nbsp;de&nbsp;parto',width:20,align:'center', search:false},
            {name:'Lugar&nbsp;de&nbsp;parto', width:20,align:'center', search:false},
            {name:'Patologia', width:15,align:'center', search:false},
            {name:'Periodo&nbsp;intergenesico', width:25,align:'center', search:false},
            {name:'Parto&nbsp;anterior', width:17,align:'center', search:false},
            {name:'Formula&nbsp;obstetrica', width:25,align:'center', search:false},
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