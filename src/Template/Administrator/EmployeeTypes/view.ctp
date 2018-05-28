<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Employee Types') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($employeeType->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($employeeType->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($employeeType->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($employeeType->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($employeeType->modified) ?></td>
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
                    <h3 class="text-center"><?= __('Related Employe Type Designations') ?></h3>
                    <?php if (!empty($employeeType->employe_type_designations)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Employee Type Id') ?></th>
                                    <th scope="col"><?= __('Title') ?></th>
                                    <th scope="col"><?= __('Status') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($employeeType->employe_type_designations as $employeTypeDesignations): ?>
                            <tr>
                                <td><?= h($employeTypeDesignations->id) ?></td>
                                <td><?= h($employeTypeDesignations->employee_type_id) ?></td>
                                <td><?= h($employeTypeDesignations->title) ?></td>
                                <td><?= h($employeTypeDesignations->status) ?></td>
                                <td><?= h($employeTypeDesignations->created) ?></td>
                                <td><?= h($employeTypeDesignations->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'EmployeTypeDesignations', 'action' => 'view', $employeTypeDesignations->id]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'EmployeTypeDesignations', 'action' => 'edit', $employeTypeDesignations->id]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'EmployeTypeDesignations', 'action' => 'delete', $employeTypeDesignations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeTypeDesignations->id),'escape'=>false]) ?>
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