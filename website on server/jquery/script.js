
$( "#accordion" ).accordion({
    "collapsible":true,
    "active": false,
    "heightStyle": "content"
});

/*$( "#menu" ).menu({
	"position":{ my: "top", at: "bottom" }
});*/
			
$( "#slider" ).slider({
	slide: function(){document.getElementById("result").value = $( "#slider" ).slider( "value" );}
});
						
$( document ).tooltip();

$('#shareBlock').cShare({
    description: 'jQuery plugin - C Share buttons...',
    showButtons: ['fb','twitter','email', 'plurk', 'line']
  });


			
