<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'hrmbd :';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?php
    echo $this->Html->meta('icon', 'icon.png', ['type'=>'image/png']);
    //echo $this->Html->meta('icon',$this->Html->url('/icon.png'));
    ?>

    <?= $this->Html->css(array(
                'bootstrap/css/bootstrap.min.css',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
                'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
                'dist/css/AdminLTE.min.css',
                'dist/css/skins/_all-skins.min.css',
                'plugins/select2/select2.min.css', #Select 2
                'custom.css'
            )
        )
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?= $this->element('header'); ?>
      <?= $this->element('left-sidebar');?>

      <?php #$this->Flash->render() ?>
      <?= $this->fetch('content') ?>

      <?= $this->element('footer');?>
      <?= $this->element('control-sidebar');?>
      <div class="control-sidebar-bg"></div>
    </div>

    <?php
      echo $this->Html->script(array(
          'plugins/jQuery/jquery-2.2.3.min.js',
          'bootstrap/js/bootstrap.min.js',
          'plugins/slimScroll/jquery.slimscroll.min.js',
          'plugins/fastclick/fastclick.js',
          'dist/js/app.min.js',
          'dist/js/demo.js',
          'plugins/select2/select2.min.js',  #Select 2
          'custom-sidebar-click'
        )
      );

      echo $this->fetch('footerScript');
    ?>
    </body>
</html>