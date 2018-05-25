<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('User Group Controller Actions') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php echo $this->Html->image('dist/img/avatar.png',['class'=>'profile-user-img img-responsive img-circle','alt'=>'User profile picture']) ?>

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

       <div class="col-md-9">
          <div class="box box-primary no-border">
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <h3><?= h($userGroupControllerAction->id) ?></h3>
                <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('User Group Controller') ?></th>
            <td><?= $userGroupControllerAction->has('user_group_controller') ? $this->Html->link($userGroupControllerAction->user_group_controller->id, ['controller' => 'UserGroupControllers', 'action' => 'view', $userGroupControllerAction->user_group_controller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Title') ?></th>
            <td><?= h($userGroupControllerAction->action_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($userGroupControllerAction->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userGroupControllerAction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userGroupControllerAction->created->format('Y-M-d h:i A')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userGroupControllerAction->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('User Group Permissions') ?></h4>
        <?php if (!empty($userGroupControllerAction->hrmbd)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('User Group Controller Id') ?></th>
                <th scope="col"><?= __('User Group Controller Action Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroupControllerAction->hrmbd as $userGroupPermissions): ?>
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
        <?php endif; ?>
    </div>
</div>



        </div>
    </section>
</div>