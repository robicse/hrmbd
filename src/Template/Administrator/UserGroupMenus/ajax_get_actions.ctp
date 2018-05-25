<?php if (count($Actions->user_group_controller_actions)) { ?>
	<?php foreach ($Actions->user_group_controller_actions as $key => $value) { ?>
		<option value="<?= $value->action ?>"><?= $value->action_title ?></option>
	<?php } ?>
<?php } ?>