<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<li class="nav-item">
    <a class="nav-link" href="history.php">
        <i class="fas fa-history fa-fw"></i>
        <span>Istoric inregistrari</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="notification.php">
        <i class="fas fa-bell fa-fw"></i>
        <span>Vezi toate notificariile</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="notification-add.php">
        <i class="fas fa-fw fa-cog"></i>
        <span>Setare alerte si parametrii</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="configuration.php">
        <i class="fas fa-fw fa-plus-square"></i>
        <span>Configuratie generala</span>
    </a>
</li>



<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

            