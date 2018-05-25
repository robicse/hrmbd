function AddOrUpdate(AjaxUrl,Data,Obj,Type){
	$.ajax({
		url 	: AjaxUrl,
		type 	: 'POST',
		data 	: Data,
		success : function(resp){
			console.log(resp);
			$(Obj).attr('data-add-edit',Type);
			$('#DisplayMessage').html(resp).show();
		},
		error : function(resp){
			console.log(resp);
		}
	});
}
$('#user-group-controller-id').change(function(){
	var ControllerID 	= $(this).val();
	if (ControllerID=='') {
		alert('Select Controller');
		return false;
	}
	var AjaxUrl 		= $(this).data('url');
	AjaxUrl = AjaxUrl +'/'+ControllerID;
	$.ajax({
		url 	: AjaxUrl,
		type 	: 'GET',
		success : function(resp){
			$('#Actions').html(resp);
			$('#Actions input[type="checkbox"]').click(function(){
				if($(this).is(':checked')){
					/*ADD NEW ACTIONS*/
					var ReqUrl = $(this).data('url') + '/' + 'add';
					var Data = {
						ControllerID 	: ControllerID,
						Action 			: $(this).val(),
						ActionTitle 	: $(this).data('title')
					}
					AddOrUpdate(ReqUrl,Data,this,'add');
				}else{
					/*DELETE EXISTING ACTIONS*/
					var ReqUrl = $(this).data('url') + '/' + 'delete';
					var Data = {
						ControllerID 	: ControllerID,
						Action 			: $(this).val(),
						ActionTitle 	: $(this).data('title')
					}
					AddOrUpdate(ReqUrl,Data,this,'delete');
				}
			});
		},
		error : function(resp){
			console.log(resp);
		}
	});
});