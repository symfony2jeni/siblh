$(document).ready(function() { 
    $("h1").click(function(){
        $(this).css('color', 'red').fadeOut('slow').fadeIn('slow')    
    })
    
    Enlace=function(){}
    Enlace.cambiar=function(){
       $("#records_list td a").click(function(){
      
            var href = $(this).attr('href');

            $('#resultado').load(href, function(){
                $(this).dialog({
                    modal: true, 
                    width: 600
                }); 

            });
            
            return false;
        });
    }
   
    tableToGrid("#records_list", {
        pager : '#pager', 
        rowNum:10, 
        gridview: true,
        colModel :[
            {name:'Id',width:10},
            {name:'Porcentaje',width:10,editable:true},
            {name:'Nota', width:10}
        ],
        loadComplete: function (){
            Enlace.cambiar();
            $("TD").css('white-space','normal');
        }
    });
    jQuery("#records_list").jqGrid('sortGrid',"Id",true);
    jQuery("#records_list").jqGrid('navGrid','#pager', {
        edit:false, 
        add:true, 
        del:false
    });
}); 

