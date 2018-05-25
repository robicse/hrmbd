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
    'select' => '<select class="form-control selectpicker UpdateHomeServiceResponsibility" data-width="100%" data-live-search="true" name="{{name}}"{{attrs}}>{{content}}</select>',
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
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?= $this->Flash->render() ?>
        <div class="box no-border">
          <div class="box-header">
            <h3 class="box-title">
              <?= $this->Html->link(__('<i class="fa fa-plus-circle"></i> Add New Users'), [
                    'action' => 'add'
                  ],[
                    'class'=>'label label-info',
                    'escape'=>false
                  ])
              ?>
            </h3>

            <div class="box-tools">
                <?php echo $this->Form->create(null,['url'=>['action'=>'index']]) ?>
                  <div class="input-group input-group-sm" style="width: 150px;">
                      <?php
                        echo $this->Form->input('search',[
                            'class'=>'form-control pull-right',
                            'placeholder'=>'Search by Phone',
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
          </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover table-bordered">
            <tr class="custom-table-header">
              <th class="text-center"><?= $this->Paginator->sort('photo') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('user_group_id') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('full_name') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('phone') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('email') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('active') ?></th>
              <th class="text-center"><?= $this->Paginator->sort('created') ?></th>
              <th THURSDAYclass="text-center"><span class="label label-success"><?= __('Actions') ?></span></th>
            </tr>
            <?php foreach ($users as $user): ?>
              <tr>
                <td class="text-center">
                  <?php
                    $dynamicPhoto = $this->Url->build([
                      'prefix'=>false,
                      'controller'=>'ImagesCustomizer',
                      'action'=>'myImage',
                      'users',
                      $user->photo,
                      25
                    ]);
                  ?>
                  <img src="<?= $dynamicPhoto ?>" alt="<?= $user->full_name ?>">
                </td>
                <td><?= $user->has('user_group') ? $this->Html->link($user->user_group->title, ['controller' => 'UserGroups', 'action' => 'view', $user->user_group->id]) : '' ?></td>
                <td><?= h($user->full_name) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="text-center">
                  <?php if ($user->active) { ?>
                    <i class="fa fa-check-square"></i>
                  <?php }else{ ?>
                    <i class="fa fa-times-circle"></i>
                  <?php } ?>
                </td>
                <td><?= h($user->created->format('Y-M-d h:i A')) ?></td>
                <td class="actions text-right">
                <?= $this->Html->link(__('<i class="fa  fa-eye"></i>'), ['action' => 'view', $user->id],['class'=>'label label-success','escape'=>false]) ?>
                <?= $this->Html->link(__('<i class="fa  fa-edit"></i>'), ['action' => 'edit', $user->id],['class'=>'label label-info','escape'=>false]) ?>
                <?= $this->Form->postLink(__('<i class="fa  fa-close"></i>'), ['action' => 'delete', $user->id], ['class'=>'label bg-red','confirm' => __('Are you sure you want to delete # {0}?', $user->id),'escape'=>false]) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="pagination pagination-large">
          <p>
            <?php
              echo $this->Paginator->counter(array(
                'format' => __('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total')
              ));
            ?>
          </p>
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