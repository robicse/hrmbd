<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('User Group Menus') ?>
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
                <h3><?= h($userGroupMenu->title) ?></h3>
                <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $userGroupMenu->has('user_group') ? $this->Html->link($userGroupMenu->user_group->title, ['controller' => 'UserGroups', 'action' => 'view', $userGroupMenu->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($userGroupMenu->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu Icon') ?></th>
            <td><?= h($userGroupMenu->menu_icon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Left Sidebar') ?></th>
            <td><?= h($userGroupMenu->left_sidebar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dashboard') ?></th>
            <td><?= h($userGroupMenu->dashboard) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($userGroupMenu->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($userGroupMenu->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userGroupMenu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userGroupMenu->created->format('Y-M-d h:i A')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userGroupMenu->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('User Group Menu Items') ?></h4>
        <?php if (!empty($userGroupMenu->user_group_menu_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Group Menu Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Menu Icon') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroupMenu->user_group_menu_items as $userGroupMenuItems): ?>
            <tr>
                <td><?= h($userGroupMenuItems->id) ?></td>
                <td><?= h($userGroupMenuItems->user_group_menu_id) ?></td>
                <td><?= h($userGroupMenuItems->title) ?></td>
                <td><?= h($userGroupMenuItems->controller) ?></td>
                <td><?= h($userGroupMenuItems->action) ?></td>
                <td><?= h($userGroupMenuItems->menu_icon) ?></td>
                <td><?= h($userGroupMenuItems->created->format('Y-M-d h:i A')) ?></td>
                <td><?= h($userGroupMenuItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'UserGroupMenuItems', 'action' => 'view', $userGroupMenuItems->id],['escape'=>false]) ?>
                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'UserGroupMenuItems', 'action' => 'edit', $userGroupMenuItems->id],['escape'=>false]) ?>
                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'UserGroupMenuItems', 'action' => 'delete', $userGroupMenuItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupMenuItems->id),'escape'=>false]) ?>
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