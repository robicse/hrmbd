<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Duty Schedules') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($dutySchedule->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($dutySchedule->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Start Time') ?></th>
                                <td><?= h($dutySchedule->start_time) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Late Time') ?></th>
                                <td><?= h($dutySchedule->late_time) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('End Time') ?></th>
                                <td><?= h($dutySchedule->end_time) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($dutySchedule->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($dutySchedule->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($dutySchedule->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>