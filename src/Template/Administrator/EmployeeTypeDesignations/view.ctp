<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Employee Type Designations') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($employeeTypeDesignation->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Employee Type') ?></th>
                                <td><?= $employeeTypeDesignation->has('employee_type') ? $this->Html->link($employeeTypeDesignation->employee_type->title, ['controller' => 'EmployeeTypes', 'action' => 'view', $employeeTypeDesignation->employee_type->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($employeeTypeDesignation->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($employeeTypeDesignation->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($employeeTypeDesignation->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($employeeTypeDesignation->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>