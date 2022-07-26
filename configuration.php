<?php
include("includes/db.php");
$ref = "configuration";
$data = $database->getReference($ref)->getValue();
foreach($data as $key){
  $selectedTemp = $data['numberOfValueChart'];
  $selectedFreqValue = $data['freqValue'];
  $selectedLocation = $data['location'];
}
?>
<!DOCTYPE html>
<html lang="ro">
<?php require "includes/header.php"; ?>
<body>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <span class="h3 mb-0 text-gray-800">Configuratie si parametrii</span><br>
    </div>
    <form style="padding:3%" action="storing_data.php" method="post" enctype="multipart/form-data">
    <?php if( $_GET['status'] == 'success'): echo '<div class="alert alert-success" role="alert"> Configuratia a fost salvata cu succes! </div>'; endif; ?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNumberOfValueChart">Valoare istoric temperatura</label> 
        <select id="numberOfValueChart" name="numberOfValueChart" class="form-control">
          <option value="none">Alege...</option>
          <option <?php if($selectedTemp == 10) echo "selected"?> value="10">Ultimele 10 intregistrari</option>
          <option <?php if($selectedTemp == 20) echo "selected"?> value="20">Ultimele 20 intregistrari</option>
          <option <?php if($selectedTemp == 30) echo "selected"?> value="30">Ultimele 30 intregistrari</option>
          <option <?php if($selectedTemp == 40) echo "selected"?> value="40">Ultimele 40 intregistrari</option>
          <option <?php if($selectedTemp == 50) echo "selected"?> value="50">Ultimele 50 intregistrari</option>
          <option <?php if($selectedTemp == 60) echo "selected"?> value="60">Ultimele 60 intregistrari</option>
          <option <?php if($selectedTemp == 100) echo "selected"?> value="100">Ultimele 100 intregistrari</option>
          <option <?php if($selectedTemp == 200) echo "selected"?> value="200">Ultimele 200 intregistrari</option>
          <option <?php if($selectedTemp == 300) echo "selected"?> value="300">Ultimele 300 intregistrari</option>
          <option <?php if($selectedTemp == 400) echo "selected"?> value="400">Ultimele 400 intregistrari</option>
          <option <?php if($selectedTemp == 600) echo "selected"?> value="600">Ultimele 600 intregistrari</option>
          <option <?php if($selectedTemp == "all") echo "selected"?> value="all">Toate inregistrarile</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputTemperatura">Frecventa actualizare temperatura (secunde)</label>
        <select id="freqValue" name="freqValue" class="form-control">
          <option value="none">Alege...</option>
          <option <?php if($selectedFreqValue == 10) echo "selected"?> value="10">10 secunde</option>
          <option <?php if($selectedFreqValue == 20) echo "selected"?> value="20">20 secunde</option>
          <option <?php if($selectedFreqValue == 30) echo "selected"?> value="30">30 secunde</option>
          <option <?php if($selectedFreqValue == 40) echo "selected"?> value="40">40 secunde</option>
          <option <?php if($selectedFreqValue == 50) echo "selected"?> value="50">50 secunde</option>
          <option <?php if($selectedFreqValue == 60) echo "selected"?> value="60">60 secunde</option>
          <option <?php if($selectedFreqValue == 120) echo "selected"?> value="120">120 secunde</option>
          <option <?php if($selectedFreqValue == 240) echo "selected"?> value="240">240 secunde</option>
          <option <?php if($selectedFreqValue == 300) echo "selected"?> value="300">300 secunde</option>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputLocation">Locatie senzor box</label>
      <input id="location" name="location" type="text" value="<?php echo $selectedLocation; ?>" class="form-control" placeholder="Locatie, ex: Dormitor">
    </div>
    <button type="submit" name="push" class="btn btn-primary">Salveaza</button>
  </form>
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
