<div class="content-wrapper">
  <!-- Main content -->
  <section class="content UsersDashboard">
  		<div class="row clearfix">
  			<div class="col-md-12">
  				<?= $this->Flash->render() ?>
  			</div>
  		</div>
  		<div class="row clearfix">
  			<div class="col-lg-3 col-xs-6">
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3><?= $user['administrator'] ?></h3>
	              <p>Administrators</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-users"></i>
	            </div>
	            <?php
	            	echo $this->Html->link('Show All <i class="fa fa-arrow-circle-right"></i>',[
		            		'controller'=>'Users',
		            		'action'=>'index',
		            		'administrator'
		            	],[
		            		'class'=>'small-box-footer',
		            		'escape'=>false
		            ]);
	            ?>
	          </div>
	        </div>
	        <div class="col-lg-3 col-xs-6">
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3><?= $user['supervisor'] ?></h3>
	              <p>Supervisors</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-users"></i>
	            </div>
	            <?php
	            	echo $this->Html->link('Show All <i class="fa fa-arrow-circle-right"></i>',[
		            		'controller'=>'Users',
		            		'action'=>'index',
		            		'supervisor'
		            	],[
		            		'class'=>'small-box-footer',
		            		'escape'=>false
		            ]);
	            ?>
	          </div>
	        </div>
	        <div class="col-lg-3 col-xs-6">
	          <div class="small-box bg-red">
	            <div class="inner">
	              <h3><?= $user['agent'] ?></h3>
	              <p>Agents</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-users"></i>
	            </div>
	            <?php
	            	echo $this->Html->link('Show All <i class="fa fa-arrow-circle-right"></i>',[
		            		'controller'=>'Users',
		            		'action'=>'index',
		            		'agent'
		            	],[
		            		'class'=>'small-box-footer',
		            		'escape'=>false
		            ]);
	            ?>
	          </div>
	        </div>
	        <div class="col-lg-3 col-xs-6">
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3><?= $user['individual'] ?></h3>
	              <p>Individual Users</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-users"></i>
	            </div>
	            <?php
	            	echo $this->Html->link('Show All <i class="fa fa-arrow-circle-right"></i>',[
		            		'controller'=>'Users',
		            		'action'=>'index',
		            		'individual'
		            	],[
		            		'class'=>'small-box-footer',
		            		'escape'=>false
		            ]);
	            ?>
	          </div>
	        </div>
  		</div>
  		<div class="row clearfix DashboardMenus">
  			<?php foreach ($AuthUser['user_group']['user_group_menus'] as $key => $menu) { ?>
  				<?php if($menu['dashboard']){ ?>
		  			<div class="col-md-3 col-sm-6 col-xs-12">
		  			<?php
		  				$url = $this->Url->build([
		  					'controller'=>$menu['controller'],
		  					'action'=>$menu['action']
		  				]);
		  			?>
		  			<a href="<?= $url ?>">
			          <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="<?= $menu['menu_icon'] ?>"></i></span>

			            <div class="info-box-content">
			              <span class="info-box-text"><?= $menu['title'] ?></span>
			            </div>
			            <!-- /.info-box-content -->
			          </div>
					</a>
			        </div>
			    <?php } ?>
	        <?php } ?>
  		</div>
  </section>
</div>