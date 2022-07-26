<?php
require "includes/notification-dropdown.php";
require "includes/check-session.php";
?>
<head>
    <title>AmbiPI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href=css/style.css rel="stylesheet">
</head>


<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">AMBI <sup>PI</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Prima pagina</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <?php require "includes/nav.php"; ?>
        </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Search -->
                <i class="fas fa-clock fa-fw" style="margin:1%;"></i>
                <strong> <body onload="startTime()"><span id="txt"></span></strong>
                <!-- Topbar Navbar -->
                <ul onclick="rel()" class="navbar-nav ml-auto">
                <!-- Nav Item - Alerts -->
                <li onclick="rel()" class="nav-item dropdown no-arrow mx-1">
                <a onclick="rel()" class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i onclick="rel()"  class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span onclick="rel()" class="badge badge-danger badge-counter"><span id="load_notification_count"></span></span></a>
                <!-- Dropdown - Alerts -->
                <div id="div" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header"> Alerte recente </h6>
                    <?php echo notification_row();?>
                    <a class="dropdown-item text-center small text-gray-500" href="notification.php">Vezi toate notificariile</a>
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <script type="text/javascript">
            function rel(){
                $("#div").load(" #div > *");
            }
            </script>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                        <a class="dropdown-item" href="change-password.php">
                            <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Schimba parola
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

    