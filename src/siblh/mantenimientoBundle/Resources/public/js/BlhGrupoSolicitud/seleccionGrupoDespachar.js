$(document).ready(function() {
    

 tableToGrid("#listadoGrupos", {
        pager : '#pagerlistadoGrupos',
        rowNum:10, 
        gridview: true, 
       // caption: "Seleccione la donante",
         sortorder: "desc",
                
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo&nbsp;grupo',width:15,align:'center'},
            {name:'Acción', width:15,align:'center'}
        ]    
    });
    jQuery("#listadoGrupos").jqGrid('sortGrid',"id",true);
    jQuery("#listadoGrupos").jqGrid('navGrid','#pagerlistadoGrupos', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
     });


