<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('User Groups') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($userGroup->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('Title') ?></th>
                                <td><?= h($userGroup->title) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Prefix') ?></th>
                                <td><?= h($userGroup->prefix) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($userGroup->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= h($userGroup->created->format('Y-M-d h:i A')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= h($userGroup->modified) ?></td>
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
                    <h3 class="text-center"><?= __('User Group Menus') ?></h3>
                    <?php if (!empty($userGroup->user_group_menus)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                    <th scope="col"><?= __('Title') ?></th>
                                    <th scope="col"><?= __('Menu Icon') ?></th>
                                    <th scope="col"><?= __('Left Sidebar') ?></th>
                                    <th scope="col"><?= __('Dashboard') ?></th>
                                    <th scope="col"><?= __('Controller') ?></th>
                                    <th scope="col"><?= __('Action') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($userGroup->user_group_menus as $userGroupMenus): ?>
                            <tr>
                                <td><?= h($userGroupMenus->title) ?></td>
                                <td><?= h($userGroupMenus->menu_icon) ?></td>
                                <td><?= h($userGroupMenus->left_sidebar) ?></td>
                                <td><?= h($userGroupMenus->dashboard) ?></td>
                                <td><?= h($userGroupMenus->controller) ?></td>
                                <td><?= h($userGroupMenus->action) ?></td>
                                <td><?= h($userGroupMenus->created->format('Y-M-d h:i A')) ?></td>
                                <td><?= h($userGroupMenus->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'UserGroupMenus', 'action' => 'view', $userGroupMenus->id],['escape'=>false]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'UserGroupMenus', 'action' => 'edit', $userGroupMenus->id],['escape'=>false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'UserGroupMenus', 'action' => 'delete', $userGroupMenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupMenus->id),'escape'=>false]) ?>
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
                    <?php if (!empty($userGroup->hrmbd)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('User Group Controller Id') ?></th>
                                <th scope="col"><?= __('User Group Controller Action Id') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($userGroup->hrmbd as $userGroupPermissions): ?>
                            <tr>
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
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= __('Users') ?></h3>
                    <?php if (!empty($userGroup->users)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Full Name') ?></th>
                                <th scope="col"><?= __('Phone') ?></th>
                                <th scope="col"><?= __('Email') ?></th>
                                <th scope="col"><?= __('Active') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($userGroup->users as $users): ?>
                            <tr>
                                <td><?= h($users->full_name) ?></td>
                                <td><?= h($users->phone) ?></td>
                                <td><?= h($users->email) ?></td>
                                <td><?= h($users->active) ?></td>
                                <td><?= h($users->created->format('Y-M-d h:i A')) ?></td>
                                <td><?= h($users->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'Users', 'action' => 'view', $users->id],['escape'=>false]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'Users', 'action' => 'edit', $users->id],['escape'=>false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id),'escape'=>false]) ?>
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