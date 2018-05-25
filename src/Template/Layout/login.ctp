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

$cakeDescription = 'hrmbd - Login';
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
          'dist/css/AdminLTE.min.css',
          'dist/css/skins/_all-skins.min.css',
          'custom.css'
        )
      )
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
  <body class="hold-transition login-page">
    <?= $this->fetch('content') ?>
  </body>
</html>
