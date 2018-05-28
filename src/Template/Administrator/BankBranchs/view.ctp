<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Bank Branchs') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($bankBranch->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Bank') ?></th>
                                <td><?= $bankBranch->has('bank') ? $this->Html->link($bankBranch->bank->title, ['controller' => 'Banks', 'action' => 'view', $bankBranch->bank->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($bankBranch->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($bankBranch->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($bankBranch->id) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($bankBranch->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($bankBranch->modified) ?></td>
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
                    <h3 class="text-center"><?= __('Related Users') ?></h3>
                    <?php if (!empty($bankBranch->users)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('User Group Id') ?></th>
                                    <th scope="col"><?= __('Full Name') ?></th>
                                    <th scope="col"><?= __('Photo') ?></th>
                                    <th scope="col"><?= __('Phone') ?></th>
                                    <th scope="col"><?= __('Email') ?></th>
                                    <th scope="col"><?= __('Password') ?></th>
                                    <th scope="col"><?= __('Card Unique Id') ?></th>
                                    <th scope="col"><?= __('Card Number') ?></th>
                                    <th scope="col"><?= __('Join Date') ?></th>
                                    <th scope="col"><?= __('Confirmation Date') ?></th>
                                    <th scope="col"><?= __('Personal Email') ?></th>
                                    <th scope="col"><?= __('Present Address') ?></th>
                                    <th scope="col"><?= __('Permanent Address') ?></th>
                                    <th scope="col"><?= __('Date Of Birth') ?></th>
                                    <th scope="col"><?= __('Gender') ?></th>
                                    <th scope="col"><?= __('Marital Status') ?></th>
                                    <th scope="col"><?= __('National Id') ?></th>
                                    <th scope="col"><?= __('Blood') ?></th>
                                    <th scope="col"><?= __('Emergency Number') ?></th>
                                    <th scope="col"><?= __('Emergency Number Relation') ?></th>
                                    <th scope="col"><?= __('Notice Period') ?></th>
                                    <th scope="col"><?= __('Provident Fund') ?></th>
                                    <th scope="col"><?= __('Payment Mode') ?></th>
                                    <th scope="col"><?= __('Bank Id') ?></th>
                                    <th scope="col"><?= __('Bank Branch Id') ?></th>
                                    <th scope="col"><?= __('Account Number') ?></th>
                                    <th scope="col"><?= __('Reference Name') ?></th>
                                    <th scope="col"><?= __('Reference Contact Number') ?></th>
                                    <th scope="col"><?= __('Reference Email') ?></th>
                                    <th scope="col"><?= __('Active') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($bankBranch->users as $users): ?>
                            <tr>
                                <td><?= h($users->id) ?></td>
                                <td><?= h($users->user_group_id) ?></td>
                                <td><?= h($users->full_name) ?></td>
                                <td><?= h($users->photo) ?></td>
                                <td><?= h($users->phone) ?></td>
                                <td><?= h($users->email) ?></td>
                                <td><?= h($users->password) ?></td>
                                <td><?= h($users->card_unique_id) ?></td>
                                <td><?= h($users->card_number) ?></td>
                                <td><?= h($users->join_date) ?></td>
                                <td><?= h($users->confirmation_date) ?></td>
                                <td><?= h($users->personal_email) ?></td>
                                <td><?= h($users->present_address) ?></td>
                                <td><?= h($users->permanent_address) ?></td>
                                <td><?= h($users->date_of_birth) ?></td>
                                <td><?= h($users->gender) ?></td>
                                <td><?= h($users->marital_status) ?></td>
                                <td><?= h($users->national_id) ?></td>
                                <td><?= h($users->blood) ?></td>
                                <td><?= h($users->emergency_number) ?></td>
                                <td><?= h($users->emergency_number_relation) ?></td>
                                <td><?= h($users->notice_period) ?></td>
                                <td><?= h($users->provident_fund) ?></td>
                                <td><?= h($users->payment_mode) ?></td>
                                <td><?= h($users->bank_id) ?></td>
                                <td><?= h($users->bank_branch_id) ?></td>
                                <td><?= h($users->account_number) ?></td>
                                <td><?= h($users->reference_name) ?></td>
                                <td><?= h($users->reference_contact_number) ?></td>
                                <td><?= h($users->reference_email) ?></td>
                                <td><?= h($users->active) ?></td>
                                <td><?= h($users->created) ?></td>
                                <td><?= h($users->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
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