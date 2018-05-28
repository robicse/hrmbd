<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Holidays') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($holiday->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($holiday->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Year') ?></th>
                                <td><?= h($holiday->year) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Month') ?></th>
                                <td><?= h($holiday->month) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Date') ?></th>
                                <td><?= h($holiday->date) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($holiday->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($holiday->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($holiday->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>