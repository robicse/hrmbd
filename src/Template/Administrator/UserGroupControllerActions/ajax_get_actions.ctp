<div class="{row}">
	<?php
		$AjaxUrl = $this->Url->build([
			'controller'=>'UserGroupControllerActions',
			'action'=>'ajaxAddOrDelete'
		]);
		foreach ($Actions as $key => $value) { ?>
			<div class="col-md-3">
				<?php
					if (in_array($value['action'], $ExistingActions)) {
						echo $this->Form->input('user_group_controller_action_id.'.$key,[
							'type'=>'checkbox',
							'value'=>$value['action'],
							'label'=>$value['action_title'],
							'checked'=>true,
							'disabled'=>true
						]);
					}else{
						echo $this->Form->input('user_group_controller_action_id.'.$key,[
							'data-url'=>$AjaxUrl,
							'type'=>'checkbox',
							'value'=>$value['action'],
							'label'=>$value['action_title'],
							'data-controllerid'=>$value['user_group_controller_id'],
							'data-title'=>$value['action_title']
						]);
					}
				?>
			</div>
	<?php } ?>
</div>