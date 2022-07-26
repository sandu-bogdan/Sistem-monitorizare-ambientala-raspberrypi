<!DOCTYPE html>
<html lang="ro">
 <?php require "includes/header.php"; ?>
 <?php require "includes/notification-page-content.php"; ?>
 <body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1><br>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <span class="h3 mb-0 text-gray-800">Notificare </span><br><br>
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4 card-body" style="color:black; text-align:center;">
                        <?php echo $textSensorType; ?><h1><?php echo $value;?><?php echo $icon;?></h1> 
                        <?php echo $difference; ?> <br>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="color:black;"><?php echo $cardTitle; ?></h5>
                            <p class="card-text"> 
                                <?php echo $prag;?><br>
                                Aceasta notificare <?php echo $iconView; ?> <br>
                                Doresti sa modifici modul de notificare? 
                                Setari notificare - <a href="notification-add.php"><i class="fas fa-fw fa-cog"></i></a>
                            </p>
                            <p class="card-text"><small class="text-muted">Data si ora notificare: <?php echo $timedate;?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <a href="javascript:history.go(-1)" class="btn btn-primary">Inapoi</a>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php require "includes/footer.php"; ?>
<!-- End of Footer -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

 <!-- Javascript includes-->
 <script src="js/vendor/chart.js/Chart.min.js"></script>
 <script src="js/time.js"></script>
 <script src="js/jquery.min.js"></script>
 <script src="js/custom.js"></script>
 <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="js/nav.js"></script>
</html>