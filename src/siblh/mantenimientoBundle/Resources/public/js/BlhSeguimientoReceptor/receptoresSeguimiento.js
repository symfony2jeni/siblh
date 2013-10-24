$(document).ready(function() {
   

    Enlace = function() {}
    Enlace.cambiar = function() {
        $("#listado_receptoresSeguimiento td a").click(function() {

            var href = $(this).attr('href');

            $('#resultado').load(href, function() {
                $(this).dialog({
                    modal: true,
                    width: 600
                });

            });
            return false;
        });
    }
    
    tableToGrid("#listado_receptoresSeguimiento", {
        pager : '#pagerReceptoresSeguimiento',
        rowNum:10, 
        gridview: true, 
        caption: "Listado de receptores",
        colModel :[
           // {name:'Id',width:80,editable:true,},
            {name:'Codigo',width:10,align:'center'},
            {name:'Nombres', width:40,align:'center'},
            {name:'Apellidos', width:40,align:'center'},
            {name:'Sexo', width:20,align:'center'}, 
            {name:'Acción', width:20,align:'center'}, 
    
        ],
        loadComplete: function (){
            Enlace.cambiar();
            $("TD").css('white-space','normal');
        }
    });
    jQuery("#listado_receptoresSeguimiento").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_receptoresSeguimiento").jqGrid('navGrid','#pagerReceptoresSeguimiento', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});


