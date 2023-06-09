<?php

/**
 * @var \App\View\AppView $this
 * @var \CakeLte\View\Helper\CakeLteHelper $this->CakeLte
 */

?>
<style>
    .content-wrapper {
        min-height: 750px !important;
    }

    aside.main-sidebar {
        background-color: #08132F !important;
    }

    .nav-link.active {
        background-color: #8E9B2C !important;
        color: #fff !important;
    }

    .loader-container {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        background-color: #fff;
        opacity: 0.9;
        background: linear-gradient(to right, rgb(255, 255, 255, .9), rgb(255, 255, 255, .9));
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->assign('title', $title); ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('cstyle.css') ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>

    <?= $this->Html->css('CakeLte./AdminLTE//plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>


    <!-- Ionicons -->
    <?= $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') ?>

    <!-- Theme style -->
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <?= $this->Html->css('CakeLte.style') ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <?= $this->Html->css('CakeLte./AdminLTE/plugins/toastr/toastr.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.min.css') ?>

    <?= $this->element('layout/css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('table.css') ?>
    <?= $this->Html->css('listing.css') ?>


    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

    <?= $this->Html->script("CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js") ?>
    <?= $this->Html->script("CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.min.js") ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/toastr/toastr.min.js') ?>
    <script>
        var baseurl = "<?= $this->Url->build('/') ?>";
    </script>

</head>
<style>
    body,
    h5,
    h6,
    p,
    h4,
    h3,
    label {
        font-family: 'Roboto', sans-serif !important;
    }

    div#id_sidebar {
        transition: 0.5s ease all;
    }

    div#id_sidebar:hover {
        transition: 0.5s ease all;
    }
    a.top-brand-logo {
    margin-left: 60px;
    margin-top: 10px;
}
img.ft-icon {
    width: 50px;
    margin-right: -7px;
}
.v-logo{
    width: 100px;
}
.close-sidebar {
    color: #000;
    background-color: #fff;
    padding: 10px 15px;
    display: block;
    text-align: right;
}
aside.main-sidebar {
    position: absolute;
    top: -48px !important;
}
</style>

<body class="hold-transition <?= $this->CakeLte->getBodyClass() ?>">
    <div class="loader-container" id="loaderss">
        <img src="<?= $this->Url->build('/') ?>img/loaders.gif" alt="Loader" class="loader">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a class="top-brand-logo">
               
                <!-- <img src="<?= $this->Url->build('/') ?>img/icon.png" alt="Logo" class="ft-icon"> -->
                    <img src="https://apar.com/wp-content/uploads/2020/11/brand-logo.png" alt="Logo" class="v-logo">

                </a>
            </div>
            <div class="col-md-6"></div>

        </div>
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav
            class="main-header navbar navbar-expand-md navbar-light navbar-white <?= $this->CakeLte->getHeaderClass() ?>">
            <div class="container-fluid pl-5 pr-4">

                <?= $this->element('header/notifications') ?>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?= $this->CakeLte->getSidebarClass() ?>">
            <!-- Brand Logo -->
            <!-- <a href="<?= $this->Url->build('/buyer/dashboard') ?>" class="brand-link"
                style="text-align-last:center;background-color:#fff;">
                <?= $this->Html->image('ft-icon.png', ['width' => '110', 'class' => 'ft_rect_logo brand-image', 'data-image' => '1']) ?>
                <span class="brand-text">
                    <?= $this->Html->image('logo_s.png', ['width' => '110', 'class' => 'ft-text', 'data-image' => '1']) ?>
                </span>
            </a> -->
            <a class="close-sidebar"><i class="fas fa-times"></i></a>
            <div class="sidebar" id="id_sidebar">
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="text-align-last: center;">
                    <div class="text-light">
                        Welcome,
                        <?= $full_name ?> (
                        <?= $group_name ?> )
                    </div>
                </div> -->
                <?= $this->element('sidebar/buyer/main') ?>
            </div>
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
                <div class="container-fluid pr-3 pl-3">
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
        <footer class="main-footer text-center p-2" style="margin-top:0px;">
            <?= $this->element('footer/main') ?>
        </footer>
    </div>
    <!-- ./wrapper -->



    <?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') ?>
    <?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') ?>


    <!-- DataTables  & Plugins -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>

    <?= $this->element('layout/script') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('/js/cscript.js') ?>
    <script>
        $(document).ready(function () { });
        $(window).on('load', function () {
            $('#loaderss').hide();
        });
        // $(".close-sidebar").hiclcide();
        // $(".main-sidebar").show();
        $(".close-sidebar").click(function(){
            // $(".main-sidebar").show().hide();
            $("body").addClass("sidebar-collapse");

        
});
        // $(".ftimage").click(function(){
        //             $(".main-sidebar").show();
                
        // });
    </script>
</body>

</html>