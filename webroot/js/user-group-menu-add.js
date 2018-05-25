$('#controller').change(function(){
	var Controller 	= $(this).val();
	var AjaxUrl 	= $(this).data('url');
	$.ajax({
		url 	: AjaxUrl,
		type 	: 'POST',
		data 	: {
			Controller : Controller
		},
		success : function(resp){
			$('#action').html(resp);
		},
		error : function(resp){
			console.log(resp);
		}
	});
});