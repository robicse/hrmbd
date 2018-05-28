<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Departments') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($department->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($department->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($department->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($department->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($department->modified) ?></td>
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
                    <h3 class="text-center"><?= __('Related Department Sections') ?></h3>
                    <?php if (!empty($department->department_sections)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Department Id') ?></th>
                                    <th scope="col"><?= __('Title') ?></th>
                                    <th scope="col"><?= __('Status') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($department->department_sections as $departmentSections): ?>
                            <tr>
                                <td><?= h($departmentSections->id) ?></td>
                                <td><?= h($departmentSections->department_id) ?></td>
                                <td><?= h($departmentSections->title) ?></td>
                                <td><?= h($departmentSections->status) ?></td>
                                <td><?= h($departmentSections->created) ?></td>
                                <td><?= h($departmentSections->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'DepartmentSections', 'action' => 'view', $departmentSections->id]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'DepartmentSections', 'action' => 'edit', $departmentSections->id]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'DepartmentSections', 'action' => 'delete', $departmentSections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departmentSections->id),'escape'=>false]) ?>
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
                    <h3 class="text-center"><?= __('Related Salarys') ?></h3>
                    <?php if (!empty($department->salarys)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="custom-table-header">
                                <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('User Id') ?></th>
                                    <th scope="col"><?= __('Department Id') ?></th>
                                    <th scope="col"><?= __('Designation Id') ?></th>
                                    <th scope="col"><?= __('Full Name') ?></th>
                                    <th scope="col"><?= __('Card Number') ?></th>
                                    <th scope="col"><?= __('Join Date') ?></th>
                                    <th scope="col"><?= __('Gross Salary') ?></th>
                                    <th scope="col"><?= __('Basic') ?></th>
                                    <th scope="col"><?= __('House Rent') ?></th>
                                    <th scope="col"><?= __('Medical') ?></th>
                                    <th scope="col"><?= __('Conveyance') ?></th>
                                    <th scope="col"><?= __('Special') ?></th>
                                    <th scope="col"><?= __('Mobile Bill') ?></th>
                                    <th scope="col"><?= __('Kpi') ?></th>
                                    <th scope="col"><?= __('Gross Payable') ?></th>
                                    <th scope="col"><?= __('Total Month Day') ?></th>
                                    <th scope="col"><?= __('Present') ?></th>
                                    <th scope="col"><?= __('Late') ?></th>
                                    <th scope="col"><?= __('Absent') ?></th>
                                    <th scope="col"><?= __('Pf Employee') ?></th>
                                    <th scope="col"><?= __('Pf Employeer') ?></th>
                                    <th scope="col"><?= __('Total Pf') ?></th>
                                    <th scope="col"><?= __('Loan') ?></th>
                                    <th scope="col"><?= __('Tax') ?></th>
                                    <th scope="col"><?= __('Mobile Bill Deduction') ?></th>
                                    <th scope="col"><?= __('Advance') ?></th>
                                    <th scope="col"><?= __('Absent Deduction') ?></th>
                                    <th scope="col"><?= __('Bonus') ?></th>
                                    <th scope="col"><?= __('Over Time') ?></th>
                                    <th scope="col"><?= __('Net Salary') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                    <?php foreach ($department->salarys as $salarys): ?>
                            <tr>
                                <td><?= h($salarys->id) ?></td>
                                <td><?= h($salarys->user_id) ?></td>
                                <td><?= h($salarys->department_id) ?></td>
                                <td><?= h($salarys->designation_id) ?></td>
                                <td><?= h($salarys->full_name) ?></td>
                                <td><?= h($salarys->card_number) ?></td>
                                <td><?= h($salarys->join_date) ?></td>
                                <td><?= h($salarys->gross_salary) ?></td>
                                <td><?= h($salarys->basic) ?></td>
                                <td><?= h($salarys->house_rent) ?></td>
                                <td><?= h($salarys->medical) ?></td>
                                <td><?= h($salarys->conveyance) ?></td>
                                <td><?= h($salarys->special) ?></td>
                                <td><?= h($salarys->mobile_bill) ?></td>
                                <td><?= h($salarys->kpi) ?></td>
                                <td><?= h($salarys->gross_payable) ?></td>
                                <td><?= h($salarys->total_month_day) ?></td>
                                <td><?= h($salarys->present) ?></td>
                                <td><?= h($salarys->late) ?></td>
                                <td><?= h($salarys->absent) ?></td>
                                <td><?= h($salarys->pf_employee) ?></td>
                                <td><?= h($salarys->pf_employeer) ?></td>
                                <td><?= h($salarys->total_pf) ?></td>
                                <td><?= h($salarys->loan) ?></td>
                                <td><?= h($salarys->tax) ?></td>
                                <td><?= h($salarys->mobile_bill_deduction) ?></td>
                                <td><?= h($salarys->advance) ?></td>
                                <td><?= h($salarys->absent_deduction) ?></td>
                                <td><?= h($salarys->bonus) ?></td>
                                <td><?= h($salarys->over_time) ?></td>
                                <td><?= h($salarys->net_salary) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['controller' => 'Salarys', 'action' => 'view', $salarys->id]) ?>
                                    <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['controller' => 'Salarys', 'action' => 'edit', $salarys->id]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['controller' => 'Salarys', 'action' => 'delete', $salarys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salarys->id),'escape'=>false]) ?>
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
                    <h3 class="text-center"><?= __('Related Weekends') ?></h3>
                    <?php if (!empty($department->weekends)): ?>
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
                    <?php foreach ($department->weekends as $weekends): ?>
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