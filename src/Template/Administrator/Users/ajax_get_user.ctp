<div class="row">
    <div class="col-md-12">
      <div class="box box-primary" style="border-top: none;">
        <div class="box-body box-profile">
            <?php
                $dynamicPhoto = $this->Url->build([
                  'prefix'=>false,
                  'controller'=>'ImagesCustomizer',
                  'action'=>'myImage',
                  'users',
                  $user->photo,
                  100
                ]);
              ?>
            <div class="col-md-12">
              <table class="table table-bordered">
                <tr>
                  <th rowspan="4">
                    <img class="profile-user-img img-responsive img-circle" src="<?= $dynamicPhoto ?>" alt="<?= h($user->full_name) ?>">
                    <h3 class="profile-username text-center"><?= h($user->full_name) ?></h3>
                    <p class="text-muted text-center"><?= h($user->phone) ?></p>
                  </th>
                </tr>
                <tr>
                  <th class="bg-navy">EMAIL</th>
                  <td><?= $user->email ?></td>
                </tr>
                <tr>
                  <th class="bg-navy">DIVISION</th>
                  <td><?= $user->division['name'] ?></td>
                </tr>
                <tr>
                  <th class="bg-navy">DISTRICT</th>
                  <td><?= $user->division_district['name'] ?></td>
                </tr>
              </table>
            </div>
        </div>
      </div>
    </div>
    
      <?php if(count($WorkshopServices)){ #If workshop has services?>
          <div class="col-md-12">
            <?php if(count($user->vehicles)){ #If user have vehicles?>
              <table class="table table-hover table-bordered">
                <thead>
                  <tr class="custom-table-header">
                    <th class="text-center" colspan="5">VEHICLE LISTS</th>
                  </tr>
                  <tr class="custom-table-header">
                    <th class="text-center">BRAND</th>
                    <th class="text-center">MODEL</th>
                    <th class="text-center">COLOR</th>
                    <th class="text-center">SELECT SERVICES</th>
                  </tr>
                </thead>
                <?php foreach ($user->vehicles as $key => $vehicle) { ?>
                  <tr>
                    <td class="middle-align"><?= $vehicle->vehicle_brand->title ?></td>
                    <td class="middle-align"><?= $vehicle->vehicle_brand_model->title ?></td>
                    <td class="middle-align"><?= $vehicle->vehicle_color->color ?></td>
                    <td class="text-center middle-align">
                      <?php
                        $options = [];
                        foreach ($WorkshopServices as $key => $service) {
                          $options[$service->id] = $service->service->title;
                        }
                        echo $this->Form->input("appointment_details.{$vehicle->id}",[
                          'options'=>$options,
                          'label'=>false,
                          'class'=>'form-control selectpicker',
                          'data-width'=>'100%',
                          'data-live-search'=>true,
                          'multiple'=>true
                        ]);
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            <?php }else{ #If user have no vehicles?>
              <div class="alert alert-danger">Now you can't set appointment. Because you don't have any Vechicles. Before appointment, Please add your Vehicle</div>
            <?php } ?>
          </div>
      <?php }else{ #If workshop has no services?>
        <div class="col-md-12">
          <div class="alert alert-danger">You can't set appointment, Because this workshop does not have available services</div>
        </div>
      <?php } ?>
</div>