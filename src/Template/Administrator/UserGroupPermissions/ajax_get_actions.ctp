<div class="{row}">
	<?php
		$AjaxUrl = $this->Url->build([
			'controller'=>'UserGroupPermissions',
			'action'=>'ajaxAddOrDelete'
		]);
		foreach ($Actions as $key => $value) { ?>
			<div class="col-md-3">
				<?php
					$AddOrDelete = 'add';
					$isChecked = '';
					if (in_array($key, $AllowMethods)) {
						$AddOrDelete = 'delete';
						$isChecked = 'checked';
					}
					echo $this->Form->input('user_group_controller_action_id.'.$key,[
						'data-url'=>$AjaxUrl,
						'type'=>'checkbox',
						'value'=>$key,
						'label'=>ucwords($value),
						'data-add-edit'=>$AddOrDelete,
						$isChecked
					]);
				?>
			</div>
	<?php } ?>
</div>