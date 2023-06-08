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
    <?php $this->assign('title', $title); ?>
    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- Theme style -->
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <?= $this->Html->css('CakeLte.style') ?>
    <?= $this->Html->css('ccss') ?>
    <?= $this->element('layout/css') ?>
    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <?= $this->fetch('css') ?>
    <style>
         aside.main-sidebar {
        background-color: #08132F !important;
    }

    .nav-link.active {
        background-color: #8E9B2C !important;
        color: #fff !important;
    }
    .ft_rect_logo {
    margin-top: 4px !important;
}
/* .layout-fixed .brand-link {
    width: 218px !important;
}*/
.main-sidebar, .main-sidebar::before {
    width: 218px;
} 
/* .sidebar-mini .main-sidebar .nav-link, .sidebar-mini-md .main-sidebar .nav-link, .sidebar-mini-xs .main-sidebar .nav-link {
    width: calc(235px - 1.1rem * 2);
} */
body,
    h5,
    h6,
    p,
    h4,
    h3,
    label {
        font-family: 'Roboto', sans-serif !important;
    }

    </style>
</head>

<body class="hold-transition <?= $this->CakeLte->getBodyClass() ?>">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?= $this->CakeLte->getHeaderClass() ?>">
            <?= $this->element('header/notifications_admin') ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?= $this->CakeLte->getSidebarClass() ?>">
            <!-- Brand Logo -->
            <!-- <a href="<?= $this->Url->build('dashboard') ?>" class="brand-link" style="background-color:#ffffff;text-align-last:center;">
            <?= $this->Html->image('ft_rect_logo.png', ['width' => '175', 'class' => 'ft_rect_logo', 'data-image' => '1']) ?>
            </a> -->
            <a href="<?= $this->Url->build('/buyer/dashboard') ?>" class="brand-link" style="text-align-last:center;background-color:#fff;">
                <?= $this->Html->image('ft-icon.png', ['width' => '110', 'class' => 'ft_rect_logo brand-image', 'data-image' => '1']) ?>
                <span class="brand-text"><?= $this->Html->image('logo_s.png', ['width' => '110', 'class' => 'ft-text', 'data-image' => '1']) ?></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar" id="id_sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              
            </div> -->
            
                <?= $this->element('sidebar/main') ?>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <div class="content-header"> -->
                <!-- <div class="container-fluid"> -->
                    <?= $this->element('content/header') ?>
                <!-- </div> -->
                <!-- /.container-fluid -->
            <!-- </div> -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                   
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <?= $this->element('aside/main') ?>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer"  style="margin-top:0px;">
            <?= $this->element('footer/main') ?>
        </footer>
    </div>
    <!-- ./wrapper -->

    
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

    <?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') ?>
    <?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') ?>
    <?= $this->Html->script('/js/cscript.js') ?>


    <?= $this->element('layout/script') ?>
    <?= $this->fetch('script') ?>
</body>

</html>