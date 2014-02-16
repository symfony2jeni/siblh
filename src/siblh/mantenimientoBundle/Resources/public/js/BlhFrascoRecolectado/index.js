$(document).ready(function() {
    
    $('#reporte').click(function(){
      var url="/app_dev.php/reportes/reporte/lechedonada/LecheDonada/pdf";
       window.open(url,'_blank');
       return false;
    });
    

 tableToGrid("#listado_frascos", {
        pager : '#pagerfrascos',
        rowNum:10,
	rownumbers: true, 
        height: '100%',
        gridview: true, 
        caption: "Listado de frascos recolectados",
         sortorder: "desc",
        
        
        
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Donante',width:15,align:'center'},
            {name:'Nombre',width:30,align:'center'},
            {name:'Frasco',width:15,align:'center'},
            {name:'Volumen&nbsp;Recolectado', width:18,align:'center', search:false},
            {name:'Onzas&nbsp;Recolectadas', width:18,align:'center', search:false},
            {name:'Forma&nbsp;de&nbsp;Extraccion', width:18,align:'center', search:false},
            {name:'Accion', width:10,align:'center', search:false}
           
            
   
        ],
    
    });
    jQuery("#listado_frascos").jqGrid('sortGrid',"Donante",true);
    jQuery("#listado_frascos").jqGrid('navGrid','#pagerfrascos', {
        edit:false, 
        add:false, 
        del:false,
        search:false,
        reload:false
    });
     jQuery("#listado_frascos").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
     });
