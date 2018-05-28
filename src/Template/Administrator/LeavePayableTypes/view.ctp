<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Leave Payable Types') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($leavePayableType->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($leavePayableType->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($leavePayableType->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($leavePayableType->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($leavePayableType->modified) ?></td>
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
                    <h3 class="text-center"><?= __('Related User Leaves') ?></h3>
                    <?php if (!empty($leavePayableType->user_leaves)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('User Id') ?></th>
                                    <th scope="col"><?= __('Card Number') ?></th>
                                    <th scope="col"><?= __('Nominated Persion Id') ?></th>
                                    <th scope="col"><?= __('Leave Quarter Id') ?></th>
                                    <th scope="col"><?= __('Leave Category Id') ?></th>
                                    <th scope="col"><?= __('Leave Payable Type Id') ?></th>
                                    <th scope="col"><?= __('Start Date') ?></th>
                                    <th scope="col"><?= __('End Date') ?></th>
                                    <th scope="col"><?= __('Approved Date') ?></th>
                                    <th scope="col"><?= __('Duration') ?></th>
                                    <th scope="col"><?= __('Note') ?></th>
                                    <th scope="col"><?= __('Supervisor Approved Status') ?></th>
                                    <th scope="col"><?= __('Hr Approved Status') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($leavePayableType->user_leaves as $userLeaves): ?>
                            <tr>
                                <td><?= h($userLeaves->id) ?></td>
                                <td><?= h($userLeaves->user_id) ?></td>
                                <td><?= h($userLeaves->card_number) ?></td>
                                <td><?= h($userLeaves->nominated_persion_id) ?></td>
                                <td><?= h($userLeaves->leave_quarter_id) ?></td>
                                <td><?= h($userLeaves->leave_category_id) ?></td>
                                <td><?= h($userLeaves->leave_payable_type_id) ?></td>
                                <td><?= h($userLeaves->start_date) ?></td>
                                <td><?= h($userLeaves->end_date) ?></td>
                                <td><?= h($userLeaves->approved_date) ?></td>
                                <td><?= h($userLeaves->duration) ?></td>
                                <td><?= h($userLeaves->note) ?></td>
                                <td><?= h($userLeaves->supervisor_approved_status) ?></td>
                                <td><?= h($userLeaves->hr_approved_status) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'UserLeaves', 'action' => 'view', $userLeaves->id]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'UserLeaves', 'action' => 'edit', $userLeaves->id]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'UserLeaves', 'action' => 'delete', $userLeaves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLeaves->id),'escape'=>false]) ?>
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