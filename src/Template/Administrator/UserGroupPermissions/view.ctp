<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('User Group Permissions') ?>
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
                <h3><?= h($userGroupPermission->id) ?></h3>
                <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $userGroupPermission->has('user_group') ? $this->Html->link($userGroupPermission->user_group->title, ['controller' => 'UserGroups', 'action' => 'view', $userGroupPermission->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Group Controller') ?></th>
            <td><?= $userGroupPermission->has('user_group_controller') ? $this->Html->link($userGroupPermission->user_group_controller->id, ['controller' => 'UserGroupControllers', 'action' => 'view', $userGroupPermission->user_group_controller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Group Controller Action') ?></th>
            <td><?= $userGroupPermission->has('user_group_controller_action') ? $this->Html->link($userGroupPermission->user_group_controller_action->id, ['controller' => 'UserGroupControllerActions', 'action' => 'view', $userGroupPermission->user_group_controller_action->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userGroupPermission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userGroupPermission->created->format('Y-M-d h:i A')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userGroupPermission->modified) ?></td>
        </tr>
    </table>
</div>



        </div>
    </section>
</div>