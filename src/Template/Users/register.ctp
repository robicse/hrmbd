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
    'label' => false,
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
<div class="login-box">
  <div class="login-logo">
    <b>hrmbd </b>Registration
  </div>
  <div class="login-box-body">
    <?php echo $this->Flash->render() ?>
    <?php echo $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
      <div class="form-group has-feedback">
        <?= $this->Form->input('full_name',['placeholder'=>'Your Name']) ?>
      </div>

      <div class="form-group has-feedback">
        <?= $this->Form->input('phone',['placeholder'=>'Phone']) ?>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <?= $this->Form->input('email',['placeholder'=>'Email (optional)']) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <?= $this->Form->input('password',['placeholder'=>'Password']) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback">
      </div>

      <div class="form-group has-feedback">
        <?= $this->Form->input('retype_password',['placeholder'=>'Retype Password','type'=>'password']) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback">
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register Now</button>
        </div>
      </div>
      <div id="CreateOrRecover" class="row">
        <div class="col-xs-12">
          Already have an account? <?php echo $this->Html->link('Login here',['action'=>'login']) ?>
        </div>
      </div>
    <?= $this->Form->end() ?>
  </div>
</div>