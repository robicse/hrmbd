<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = false;

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>hrmbd:: Page Not found</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href='http://fonts.googleapis.com/css?family=Metal+Mania' rel='stylesheet' type='text/css'>
        <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
        }
        body{
            font-family: 'Metal Mania', cursive;
            background:skyblue;
        }
        .wrap{
            height: 100vh;
        }
        .logo{
            position: absolute;
            top: 40%;
            right: 0px;
            left: 0px;
            text-align: center;
        }
        .logo h1{
            font-size:50px;
            color:yellow;
            text-align:center;
            margin-bottom:1px;
            text-shadow:1px 1px 6px #555;
        }
        .logo p{
            color:white;
            font-size:20px;
            margin-top:1px;
            text-align:center;
        }
        .logo p span{
            color:lightgreen;
        }
        .sub a{
            color:yellow;
            background:#06afd8;
            text-decoration:none;
            padding:5px;
            font-size:13px;
            font-family: arial, serif;
            font-weight:bold;
        }
        .footer{
            color:white;
            position:absolute;
            right:10px;
            bottom:10px;
        }
        .footer a{
            color:yellow;
        }
        </style>
    </head>
    <body>
        <div class="wrap">
            <div class="logo">
              <h1>404 - <?= h($message) ?></h1>
              <p>Sorry This was deadlink - Page not Found</p>
               <div class="sub">
                 <p><a href="/">Go Back to Home</a></p>
                </div>
            </div>
        </div>
        <div class="footer">
            <a href="/">hrmbd</a>
        </div>
    </body>
</html>
