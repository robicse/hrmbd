<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('User Group Controllers') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($userGroupController->controller_title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('Controller Title') ?></th>
                                <td><?= h($userGroupController->controller_title) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Controller') ?></th>
                                <td><?= h($userGroupController->controller) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($userGroupController->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= h($userGroupController->created->format('Y-M-d h:i A')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= h($userGroupController->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= __('User Group Controller Actions') ?></h3>
                    <?php if (!empty($userGroupController->user_group_controller_actions)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('User Group Controller Id') ?></th>
                                    <th scope="col"><?= __('Action Title') ?></th>
                                    <th scope="col"><?= __('Action') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($userGroupController->user_group_controller_actions as $userGroupControllerActions): ?>
                            <tr>
                                <td><?= h($userGroupControllerActions->id) ?></td>
                                <td><?= h($userGroupControllerActions->user_group_controller_id) ?></td>
                                <td><?= h($userGroupControllerActions->action_title) ?></td>
                                <td><?= h($userGroupControllerActions->action) ?></td>
                                <td><?= h($userGroupControllerActions->created->format('Y-M-d h:i A')) ?></td>
                                <td><?= h($userGroupControllerActions->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'UserGroupControllerActions', 'action' => 'view', $userGroupControllerActions->id],['escape'=>false]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'UserGroupControllerActions', 'action' => 'edit', $userGroupControllerActions->id],['escape'=>false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'UserGroupControllerActions', 'action' => 'delete', $userGroupControllerActions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupControllerActions->id),'escape'=>false]) ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php endif; ?>
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= __('User Group Permissions') ?></h3>
                    <?php if (!empty($userGroupController->hrmbd)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('User Group Id') ?></th>
                                    <th scope="col"><?= __('User Group Controller Id') ?></th>
                                    <th scope="col"><?= __('User Group Controller Action Id') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($userGroupController->hrmbd as $userGroupPermissions): ?>
                            <tr>
                                <td><?= h($userGroupPermissions->id) ?></td>
                                <td><?= h($userGroupPermissions->user_group_id) ?></td>
                                <td><?= h($userGroupPermissions->user_group_controller_id) ?></td>
                                <td><?= h($userGroupPermissions->user_group_controller_action_id) ?></td>
                                <td><?= h($userGroupPermissions->created->format('Y-M-d h:i A')) ?></td>
                                <td><?= h($userGroupPermissions->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'UserGroupPermissions', 'action' => 'view', $userGroupPermissions->id],['escape'=>false]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'UserGroupPermissions', 'action' => 'edit', $userGroupPermissions->id],['escape'=>false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'UserGroupPermissions', 'action' => 'delete', $userGroupPermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermissions->id),'escape'=>false]) ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php endif; ?>
    </section>
</div>