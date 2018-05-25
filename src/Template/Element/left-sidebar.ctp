<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <?php
                $dynamicPhoto = $this->Url->build([
                  'prefix'=>false,
                  'controller'=>'ImagesCustomizer',
                  'action'=>'myImage',
                  'users',
                  $AuthUser['photo'],
                  100
                ]);
              ?>
          <img src="<?= $dynamicPhoto ?>" class="img-circle" alt="<?= $AuthUser['full_name'] ?>">
        </div>
        <div class="pull-left info">
          <p><?php echo $AuthUser['full_name'] ?></p>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li>
          <?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>DASHBOARD</span>',['controller'=>'Users','action'=>'dashboard'],['escape'=>false]) ?>
        </li>
        <li class="header">hrmbd NAVIGATION</li>
        <!-- SIDEBAR MENUS -->
        <?php if(count($AuthUser['user_group']['user_group_menus'])){ ?>
          <?php foreach ($AuthUser['user_group']['user_group_menus'] as $Menus) { ?>
            <?php if($Menus['left_sidebar']){ ?>
              <?php
                $menuActiveClass    = '';
                if ($this->request->params['controller']==$Menus['controller']) {
                  $menuActiveClass  = 'active';
                }
              ?>
              <li class="treeview <?= $menuActiveClass ?>">
                <a href="#">
                  <i class="<?= $Menus['menu_icon'] ?>"></i> <span><?= $Menus['title'] ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php foreach ($Menus['user_group_menu_items'] as  $item) { ?>
                    <?php { ?>
                      <?php
                        $ChildActiveClass = '';
                        if (($this->request->params['controller']==$item['controller']) && ($this->request->params['action']==$item['action'])) {
                          $ChildActiveClass = 'childActive';
                        }
                      ?>
                      <li class="<?= $ChildActiveClass ?>">
                        <?= $this->Html->link('<i class="'.$item['menu_icon'].'"></i>'.$item['title'],['controller'=>$item['controller'],'action'=>$item['action']],['escape'=>false]) ?>
                      </li>
                     <?php } ?>
                  <?php } ?>
                </ul>
              </li>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </ul>
    </section>
  </aside>