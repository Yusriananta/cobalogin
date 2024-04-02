<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/img/logo/LogoSemenGresik.png" rel="shortcut icon">

    <script type="text/javascript">
        // Deteksi waktu sesi habis
        var sessionTimeout = <?php echo $this->session->sess_expiration; ?>; // Waktu sesi dalam milidetik
        setTimeout(function() {
            alert("Waktu sesi Anda telah habis. Silakan login kembali."); // Tampilkan pesan peringatan
            window.location.href = "<?php echo base_url('auth/logout'); ?>"; // Redirect ke halaman logout atau halaman login
        }, sessionTimeout);
    </script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('user');?>">
                <div class="sidebar-brand-icon">
                   <img src="<?php echo base_url('assets/img/logo/')."SemenGresikWhite.png";?>" width="60">
                </div>
                <div class="sidebar-brand-text mx-1">MONITOR BUDAYA SG</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">


           <!-- QUERY MENU -->

           <?php
           $role_id = $this->session->userdata('role_id');
           $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = '$role_id'
                    ORDER BY `user_access_menu`.`menu_id` ASC
            ";
            $menu = $this->db->query($queryMenu)->result_array();
           ?>



             <!-- LOOPING MENU -->
             <?php foreach ($menu as $m):?>

            <div class="sidebar-heading">
                <?php echo $m['menu'];?>
            </div>


            <!-- LOOPING SUBMENU -->

            <?php
            $menuid = $m['id'];
            $querySubMenu = "SELECT *
                            FROM `user_sub_menu` 
                            WHERE `menu_id` = '$menuid'
       ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm):?>
                <?php if ($title == $sm['title']):?>
                 <li class="nav-item active">
                    <?php else:?>
                 <li class="nav-item">
                    <?php endif;?>
                <a class="nav-link pb-0" href="<?php echo base_url($sm['url']);?>">
                    <i class="<?php echo $sm['icon'];?>"></i>
                    <span><?php echo $sm['title'];?></span></a>
            </li>
            <?php endforeach;?>


            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <?php endforeach;?>


            <!-- Nav Item - Dashboard -->
           


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
