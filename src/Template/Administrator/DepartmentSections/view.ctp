<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Department Sections') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($departmentSection->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('Department') ?></th>
                                <td><?= $departmentSection->has('department') ? $this->Html->link($departmentSection->department->title, ['controller' => 'Departments', 'action' => 'view', $departmentSection->department->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Title') ?></th>
                                <td><?= h($departmentSection->title) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Status') ?></th>
                                <td><?= h($departmentSection->status) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($departmentSection->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= h($departmentSection->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= h($departmentSection->modified) ?></td>
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
                    <h3 class="text-center"><?= __('Related Weekends') ?></h3>
                    <?php if (!empty($departmentSection->weekends)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Department Id') ?></th>
                                    <th scope="col"><?= __('Department Section Id') ?></th>
                                    <th scope="col"><?= __('Date') ?></th>
                                    <th scope="col"><?= __('Status') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($departmentSection->weekends as $weekends): ?>
                            <tr>
                                <td><?= h($weekends->id) ?></td>
                                <td><?= h($weekends->department_id) ?></td>
                                <td><?= h($weekends->department_section_id) ?></td>
                                <td><?= h($weekends->date) ?></td>
                                <td><?= h($weekends->status) ?></td>
                                <td><?= h($weekends->created) ?></td>
                                <td><?= h($weekends->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'Weekends', 'action' => 'view', $weekends->id]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'Weekends', 'action' => 'edit', $weekends->id]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'Weekends', 'action' => 'delete', $weekends->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weekends->id),'escape'=>false]) ?>
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