<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Leave Packages') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="box box-primary no-border">
                <div class="box-body no-padding">
                    <h3 class="text-center"><?= h($leavePackage->title) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-navy"><?= __('Title') ?></th>
                                <td><?= h($leavePackage->title) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Status') ?></th>
                                <td><?= h($leavePackage->status) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Casual') ?></th>
                                <td><?= $this->Number->format($leavePackage->casual) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Sick') ?></th>
                                <td><?= $this->Number->format($leavePackage->sick) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Earned') ?></th>
                                <td><?= $this->Number->format($leavePackage->earned) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Created') ?></th>
                                <td><?= h($leavePackage->created) ?></td>
                            </tr>
                            <tr>
                                <th class="bg-navy"><?= __('Modified') ?></th>
                                <td><?= h($leavePackage->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>