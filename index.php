<!DOCTYPE html>
<html lang="ro">
 <?php require "includes/header.php"; ?>
 <body>
  <!-- Begin Page Content -->
  <div class="container-fluid">
   <div class="card shadow mb-4">
    <div class="card-body">
     <span class="h3 mb-0 text-gray-800">
        Bine ai venit, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</span><br> 
        Ultima actualizare:&nbsp;<span id="load_last_check"></span> | Locatie: <span id="load_location"></span>
    </div>
    <img src="img/home.svg" height="100%;" />
   </div>
   <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
       <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
          <span class="blink"></span> Temperatura
         </div>
         <div class="h5 mb-0 font-weight-bold text-gray-800">
          <span id="load_updates"></span>&#176;C
         </div>
         <span style="font-size:80%">Detectie temperatura ambientala curenta</span>
        </div>
        <div class="col-auto">
         <i class="fas fa-temperature-high fa-2x text-gray-300"></i>
        </div>
       </div>
      </div>
     </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
       <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
          <span class="blink"></span> Umiditate
         </div>
         <div class="h5 mb-0 font-weight-bold text-gray-800">
         <span id="load_hum"></span>%
         </div>
         <span style="font-size:80%">Detectie umiditate ambientala curenta</span>
        </div>
        <div class="col-auto">
         <i class="fa fa-circle fa-2x text-gray-300"></i>
        </div>
       </div>
      </div>
     </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
       <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
          <span class="blink"></span> Detectie lumina
         </div>
         <div class="row no-gutters align-items-center">
          <div class="col-auto">
           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
           <span id="load_light"></span>
           </div>
           <span style="font-size:80%">Detectie lumina ambientala curenta</span>
          </div>
         </div>
        </div>
        <div class="col-auto">
         <i class="fas fa-lightbulb fa-2x text-gray-300"></i>
        </div>
       </div>
      </div>
     </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
       <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
          <span class="blink"></span> Detectie gaze
         </div>
         <div class="h5 mb-0 font-weight-bold text-gray-800">
         <span id="load_gas"></span>
         </div>
         <span style="font-size:80%">Gpl Izobutan Propan Metan Alcool Hidrogen Fum </span>
        </div>
        <div class="col-auto">
         <i class="fas fa-burn fa-2x text-gray-300"></i>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>

   <div class="row">
    <div class="col-lg-6 mb-4">
     <div class="card shadow mb-4">
      <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
        Grafic temperatura
        <i onclick="showGraph();" class="fas fa-sync"></i>
       </h6>
      </div>
      <div class="card-body">
       <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
       </div>
      </div>
     </div>
    </div>

    <div class="col-lg-6 mb-4">
     <div class="card shadow mb-4">
      <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
        Grafic umiditate
        <i onclick="showGraphHum();" class="fas fa-sync"></i>
       </h6>
      </div>
      <div class="card-body">
       <div id="chart-container-hum">
        <canvas id="graphCanvasHum"></canvas>
       </div>
      </div>
     </div>
    </div>

    <div class="col-lg-6 mb-4">
     <div class="card shadow mb-4">
      <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
        Grafic lumina ambientala
        <i onclick="showGraphLight();" class="fas fa-sync"></i>
       </h6>
      </div>
      <div class="card-body">
       <div id="chart-container-light">
        <canvas id="graphCanvasLight"></canvas>
       </div>
      </div>
     </div>
    </div>

    <div class="col-lg-6 mb-4">
     <div class="card shadow mb-4">
      <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
        Grafic gas
        <i onclick="showGraphGas();" class="fas fa-sync"></i>
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
 </body>
 <!-- End of Page Content -->

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
