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
$('#user-group-controller-id,#user-group-id').change(function(){
	var UserGroupID 	= $('#user-group-id').val();
	var ControllerID 	= $('#user-group-controller-id').val();
	if (ControllerID=='') {
		alert('Select Controller');
		return false;
	}
	var AjaxUrl 		= $(this).data('url');
	AjaxUrl = AjaxUrl +'/'+ControllerID+'/'+UserGroupID;
	$.ajax({
		url 	: AjaxUrl,
		type 	: 'GET',
		success : function(resp){
			$('#Actions').html(resp);
			$('#Actions input[type="checkbox"]').click(function(){
				if($(this).is(':checked')){
					/*ADD NEW PERMISSION*/
					var ReqUrl = $(this).data('url') + '/' + 'add';
					var Data = {
						UserGroupID 	: UserGroupID,
						ControllerID 	: ControllerID,
						ActionID 		: $(this).val()	
					}
					AddOrUpdate(ReqUrl,Data,this,'add');
				}else{
					/*DELETE PERMISSION*/
					var ReqUrl = $(this).data('url') + '/' + 'delete';
					var Data = {
						UserGroupID 	: UserGroupID,
						ControllerID 	: ControllerID,
						ActionID 		: $(this).val()	
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