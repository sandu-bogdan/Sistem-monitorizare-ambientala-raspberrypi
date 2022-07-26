<!DOCTYPE html>
<html lang="ro">
    <?php require "includes/header.php"; ?>
    <?php 
    if(isset($_POST['history'])){
        $date = $_POST['date'];
    }
    // check if date > current date
    if($date > date("Y-m-d")){
        $error = true;
        $error_cod = 1;
    }
    
    //check format date
    $format = 'Y-m-d';
    if(DateTime::createFromFormat($format, $date) == false){
        $error = true;
        $error_cod = 2;
    }
    
    //check if not empty
    if($date ==""){
        $error = true;
        $error_cod = 3;
    }
    
    switch ($error_cod){
        case 1:
            echo "<meta http-equiv='refresh' content='0;url= history.php?error=1'>";
            exit();
            break;
        case 2:
            header("Location: history.php?error=2");
            echo "<meta http-equiv='refresh' content='0;url= history.php?error=2'>";
            exit();
            break;
        case 3:
            header("Location: history.php?error=3");
            echo "<meta http-equiv='refresh' content='0;url= history.php?error=3'>";
            exit();
            break;
        }
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Grafic temperatura <i onclick="showCustomDateTemp();" class="fas fa-sync"></i>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div id="chart-container">
                            <canvas id="graphCanvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Grafic umiditate <i onclick="showCustomDateHum();" class="fas fa-sync"></i>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div id="chart-container-hum">
                            <canvas id="graphCanvasHum"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Grafic lumina ambientala <i onclick="showCustomDateLight();" class="fas fa-sync"></i>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div id="chart-container-light">
                            <canvas id="graphCanvasLight"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Grafic gas <i onclick="showCustomDateGas();" class="fas fa-sync"></i>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div id="chart-container-gas">
                            <canvas id="graphCanvasGas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
    <script src="js/custom-history.js"></script>
    <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/nav.js"></script>
    <script> let date ="<?php echo $date; ?>" </script>
    
</html>