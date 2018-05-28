<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Weekends') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($weekend->id) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Department') ?></th>
                                <td><?= $weekend->has('department') ? $this->Html->link($weekend->department->title, ['controller' => 'Departments', 'action' => 'view', $weekend->department->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Department Section') ?></th>
                                <td><?= $weekend->has('department_section') ? $this->Html->link($weekend->department_section->title, ['controller' => 'DepartmentSections', 'action' => 'view', $weekend->department_section->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Date') ?></th>
                                <td><?= h($weekend->date) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($weekend->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($weekend->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($weekend->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>