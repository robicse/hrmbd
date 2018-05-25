<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= __('Users') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?= $user->full_name ?></h3>
              <h5 class="widget-user-desc"><?= $user->phone ?></h5>
            </div>
            <div class="widget-user-image">
              <?php
                    $dynamicPhoto = $this->Url->build([
                      'prefix'=>false,
                      'controller'=>'ImagesCustomizer',
                      'action'=>'myImage',
                      'users',
                      $user->photo,
                      200
                    ]);
                  ?>
              <img src="<?= $dynamicPhoto ?>" class="img-circle" alt="<?= $user->full_name ?>">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">User Group</h5>
                    <span class="description-text"><?= $user->user_group->title ?></span>
                  </div>
                </div>
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">User Email</h5>
                    <span class="description-text"><?= $user->email ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
</div>