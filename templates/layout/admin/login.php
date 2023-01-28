<?php

/**
 * @var \App\View\AppView $this
 * @var \CakeLte\View\Helper\CakeLteHelper $this->CakeLte
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title')?></title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- Theme style -->
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <?= $this->Html->css('CakeLte.style') ?>
    <?= $this->element('layout/css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['jquery']) ?>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo ">
            <!-- <br /> <span style="font-size:22px;"><b>eProcurement System</b></span> -->
            <span style="font-size:30px;"><b><span style="color:#FF0000;">V</span>e<span style="color:#298A08;">K</span><span style="color:#DF01A5;">P</span>ro</b></span>
            <div style="font-size:15px;"><strong><i>Vendor Customer procurement</i></strong></div>

            <span style="font-size:12px;"><b>Powered by</b></span> <a href="#" class="brand-link" ><?= $this->Html->image('ft_rect_logo.png', ['width' => '130']) ?></a>
        </div>
        <!-- /.login-logo -->
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

    <?= $this->fetch('script') ?>
</body>

</html>