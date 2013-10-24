//src/minsal/academicaAnBundle/Resource/public/js/Estudiante/index.js
$(document).ready(function() {
   

    Enlace = function() {}
    Enlace.cambiar = function() {
        $("#listado_receptores td a").click(function() {

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
    
    tableToGrid("#listado_receptores", {
        pager : '#pagerReceptores',
        rowNum:10, 
        gridview: true, 
        caption: "Seleccione las solicitudes a agrupar",
        
        
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
    jQuery("#listado_receptores").jqGrid('sortGrid',"Codigo",true);
    jQuery("#listado_receptores").jqGrid('navGrid','#pagerReceptores', {
        edit:false, 
        add:false, 
        del:false,
        search:true,
        reload:true
    });
});