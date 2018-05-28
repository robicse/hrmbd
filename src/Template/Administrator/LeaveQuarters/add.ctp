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
          <?= __('Leave Quarters') ?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">Other</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <?= $this->Flash->render() ?>
                <!-- general form elements -->
                <div class="box box-primary no-border">
                    <div class="box-header with-border">
                      <h3 class="box-title"><?= __('Add Leave Quarter') ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?= $this->Form->create($leaveQuarter) ?>
                    <?php
                        echo $this->Form->input('title');
                        #echo $this->Form->input('start_date');
                        #echo $this->Form->input('end_date');
                    ?>
                    <!-- Date -->
                    <div class="form-group">
                        <label>Start Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input id="startDate" type="text" name="start_date" class="form-control">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <!-- End Date -->
                    <div class="form-group">
                        <label>End Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input id="endDate" name="end_date" value="" class="form-control" type="text">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <?php 
                        echo $this->Form->input('casual_duration');
                        echo $this->Form->input('sick_duration');
                        echo $this->Form->input('earned_duration');
                        echo $this->Form->input('total_duration');
                    ?>
                    <div class="box-footer text-right">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script>
      $(function () {
        
        //Date picker
        $('#datepicker_end_date').datepicker({
          //customize start
          format: 'yyyy-mm-dd',
          //customize end
          autoclose: true
        })

        
      })
    </script>