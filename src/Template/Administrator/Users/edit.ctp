<?php
$custom_template = [
    'button' => '<button{{attrs}}>{{text}}</button>',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    'checkboxFormGroup' => '{{label}}',
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
    'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}',
    'error' => '<div class="error-message">{{content}}</div>',
    'errorList' => '<ul>{{content}}</ul>',
    'errorItem' => '<li>{{text}}</li>',
    'file' => '<input type="file" name="{{name}}"{{attrs}}>',
    'fieldset' => '<fieldset{{attrs}}>{{content}}</fieldset>',
    'formStart' => '<form{{attrs}}><div class="box-body">',
    'formEnd' => '</div></form>',
    'formGroup' => '{{label}}{{input}}',
    'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
    'label' => '<label{{attrs}}>{{text}}</label>',
    'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
    'legend' => '<legend>{{text}}</legend>',
    'multicheckboxTitle' => '<legend>{{text}}</legend>',
    'multicheckboxWrapper' => '<fieldset{{attrs}}>{{content}}</fieldset>',
    'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
    'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
    'select' => '<select class="form-control selectpicker" data-width="100%" data-live-search="true" name="{{name}}"{{attrs}}>{{content}}</select>',
    'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
    'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
    'radioWrapper' => '{{label}}',
    'textarea' => '<textarea name="{{name}}"{{attrs}}>{{value}}</textarea>',
    'submitContainer' => '<div class="submit">{{content}}</div>',
];
$this->Form->templates($custom_template);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
          <?= __('Users') ?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">Other</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user,['type'=>'file']) ?>
                    <div class="box box-primary no-border">
                        <div class="box-header with-border">
                          <h3 class="box-title"><?= __('Edit User') ?></h3>
                        </div>
                        <div style="overflow: hidden;">
                            <div class="col-md-12">
                                <?php echo $this->Form->input('user_group_id', ['options' => $userGroups]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('full_name'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('phone'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('email'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('active',['options'=>['0'=>'No','1'=>'Yes']]); ?>
                            </div>
                            <?php /* ?>
                            <div class="col-md-4">
                                <?php
                                    $ajaxUrl = $this->Url->build([
                                        'controller'=>'DivisionDistricts',
                                        'action'=>'ajaxGetDistrict'
                                    ]);
                                    echo $this->Form->input('division_id', [
                                        'options' => $Divisions,
                                        'label'=>'Division',
                                        'empty'=>'Select Division',
                                        'data-url'=>$ajaxUrl
                                    ]);
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                    $ajaxUrl = $this->Url->build([
                                        'controller'=>'DivisionDistrictUpazilas',
                                        'action'=>'ajaxGetUpazila'
                                    ]);
                                    echo $this->Form->input('division_district_id', [
                                        'options' => $DivisionDistricts,
                                        'label'=>'District',
                                        'empty'=>'Select District',
                                        'data-url'=>$ajaxUrl
                                    ]);
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                    echo $this->Form->input('division_district_upazila_id', [
                                        'options' => $DivisionDistrictUpazilas,
                                        'label'=>'Upazila',
                                        'empty'=>'Select Upazila'
                                    ]);
                                ?>
                            </div>
                            <?php */ ?>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('card_uniqueid'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('card_number'); ?>
                            </div>
                            <div class="col-md-6">
                                <!-- Date -->
                                <div class="form-group">
                                    <label>Join Date</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input id="joinDate" type="text" name="join_date" value="<?php if(isset($user['join_date'])){echo $user['join_date'];} ?>" class="form-control">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <div class="col-md-6">
                                <!-- End Date -->
                                <div class="form-group">
                                    <label>Confirmation Date</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input id="confirmationDate" name="confirmation_date" value="<?php if(isset($user['confirmation_date'])){echo $user['confirmation_date'];} ?>" class="form-control" type="text">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('personal_email'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('present_address'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('permanent_address'); ?>
                            </div>
                            <div class="col-md-6">
                                <!-- End Date -->
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input id="dateOfBirthDate" name="date_of_birth" value="<?php if(isset($user['date_of_birth'])){echo $user['date_of_birth'];} ?>" class="form-control" type="text">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('gender',['options'=>['male'=>'Male','female'=>'Female']]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('marital_status',['options'=>['single'=>'Single','married'=>'Married']]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('nationalid'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('blood'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('emergency_number',['type'=>'number']); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('emergency_number_relation'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('notice_period',['type'=>'number']); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('provident_fund',['options'=>['yes'=>'Yes','no'=>'No']]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('salary_bank_payment_mode',['options'=>['yes'=>'Yes','no'=>'No']]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('bank_id',['options'=>$banks,'empty'=>'--Select--']); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('bank_branch_id',['options'=>$bankBranchs,'empty'=>'--Select--']); ?>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <?= $this->Form->button(__('Update'),['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </section>
</div>
<?php $this->Html->scriptStart(['block' => 'footerScript']); ?>
    $('#division-id').change(function(){
        var ajaxUrl     = $(this).data('url');
        var division    = $(this).val();
        ajaxUrl         = ajaxUrl + '/' + division;
        console.log(division,ajaxUrl)
        $.ajax({
            url     : ajaxUrl,
            type    : 'GET',
            success : function(resp){
                $('#division-district-id').html(resp);
            },
            error   : function(resp){
                console.log(resp)
            }   
        });
    });

    $('#division-district-id').change(function(){
        var ajaxUrl     = $(this).data('url');
        var upazila     = $(this).val();
        ajaxUrl         = ajaxUrl + '/' + upazila;
        console.log(upazila,ajaxUrl)
        $.ajax({
            url     : ajaxUrl,
            type    : 'GET',
            success : function(resp){
                $('#division-district-upazila-id').html(resp);
            },
            error   : function(resp){
                console.log(resp)
            }   
        });
    });
<?php $this->Html->scriptEnd(); ?>