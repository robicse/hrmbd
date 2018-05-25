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
    'formStart' => '<form{{attrs}}>',
    'formEnd' => '</form>',
    'formGroup' => '{{label}}{{input}}',
    'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
    'inputContainer' => '{{content}}',
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
      <?= __('User Group Menu Items') ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?= $this->Flash->render() ?>
        <div class="box no-border">
          <div class="box-header">
            <h3 class="box-title"><?= __('User Group Menu Items') ?></h3>
            <?php /*{ ?>
            <div class="box-tools">
                <?php echo $this->Form->create(null,['url'=>['action'=>'index']]) ?>
                  <div class="input-group input-group-sm" style="width: 150px;">
                      <?php
                        echo $this->Form->input('search',[
                            'class'=>'form-control pull-right',
                            'placeholder'=>'Search by Name',
                            'label'=>false
                          ]
                        );
                      ?>
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                  </div>
                <?php echo $this->Form->end() ?>
              </div>
            <?php }*/ ?>
          </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover table-bordered">
            <tr class="custom-table-header">
              <th class="text-center"><?= $this->Paginator->sort('user_group_menu_id') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('title') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('controller') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('action') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('menu_icon') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('created') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('modified') ?></th>
              <th THURSDAYclass="text-center"><span class="label label-success"><?= __('Actions') ?></span></th>
            </tr>
            <?php foreach ($userGroupMenuItems as $userGroupMenuItem): ?>
              <tr>
                <td><?= $userGroupMenuItem->has('user_group_menu') ? $this->Html->link($userGroupMenuItem->user_group_menu->title, ['controller' => 'UserGroupMenus', 'action' => 'view', $userGroupMenuItem->user_group_menu->id]) : '' ?></td>
                <td><?= h($userGroupMenuItem->title) ?></td>
                <td><?= h($userGroupMenuItem->controller) ?></td>
                <td><?= h($userGroupMenuItem->action) ?></td>
                <td><?= h($userGroupMenuItem->menu_icon) ?></td>
                <td><?= h($userGroupMenuItem->created->format('Y-M-d h:i A')) ?></td>
                <td><?= h($userGroupMenuItem->modified) ?></td>
                <td class="actions text-right">
                <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['action' => 'view', $userGroupMenuItem->id],['class'=>'label label-success','escape'=>false]) ?>
                <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['action' => 'edit', $userGroupMenuItem->id],['class'=>'label label-info','escape'=>false]) ?>
                <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['action' => 'delete', $userGroupMenuItem->id], ['class'=>'label bg-red','confirm' => __('Are you sure you want to delete # {0}?', $userGroupMenuItem->id),'escape'=>false]) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="pagination pagination-large">
          <ul class="pagination">
            <?php
              echo $this->Paginator->prev('&laquo; '.__('prev'), array('tag' => 'li','escape'=>false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
              echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
              echo $this->Paginator->next(__('next').' &raquo;', array('tag' => 'li','currentClass' => 'disabled','escape'=>false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
          </ul>
        </div>

      </div>
    </div>
  </section>
</div>