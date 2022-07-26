<?php
include("includes/db.php");
$ref = "notification";
$data = $database->getReference($ref)->getValue();
foreach($data as $key){
    $selectedTempStatusNoti = $data['tempStatusNoti'];
    $selectedTempPragNoti = $data['tempPragNoti'];
    $selectedTempIntvNoti = $data['tempIntvNoti'];
    $selectedHumStatusNoti = $data['humStatusNoti'];
    $selectedHumPragNoti = $data['humPragNoti'];
    $selectedHumIntvNoti = $data['humIntvNoti'];
    $selectedLightStatusNoti = $data['lightStatusNoti'];
    $selectedLightPragNoti = $data['lightPragNoti'];
    $selectedLightIntvNoti = $data['lightIntvNoti'];
    $selectedGasStatusNoti = $data['gasStatusNoti'];
    $selectedGasPragNoti = $data['gasPragNoti'];
    $selectedGasIntvNoti = $data['gasIntvNoti'];
}
?>

<!DOCTYPE html>
<html lang="ro">
    <?php require "includes/header.php"; ?>
    <body>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1><br>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <span class="h3 mb-0 text-gray-800">Adauga notificare</span><br>
                </div>
                <form style="padding:3%" action="storing_data.php" method="post" enctype="multipart/form-data">
                <?php if( $_GET['status'] == 'success'): echo '<div class="alert alert-success" role="alert"> Configuratia a fost salvata cu succes! </div>'; endif; ?>
                <strong>Notificare temperatura</strong>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputTempStatusNoti">Status notificare depasire prag temperatura</label> 
                        <select id="tempStatusNoti" name="tempStatusNoti" class="form-control"> 
                            <option <?php if($selectedTempStatusNoti == "on") echo "selected"?> value="on">Activ</option>
                            <option <?php if($selectedTempStatusNoti == "off" || $selectedTempStatusNoti == "") echo "selected"?> value="off">Dezactivat</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTempPragNoti">Prag depasire temperatura (&#176;C)</label>
                        <input type="number"  min="-100"  data-bind="value:tempPragNoti" id="tempPragNoti" name="tempPragNoti" type="text" value="<?php echo $selectedTempPragNoti; ?>" class="form-control" placeholder="Ex. 20 - Doar valori numerice intregi">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTempIntvNoti">Interval recurenta notificare (Minute)</label>
                        <input type="number"  min="0"  data-bind="value:tempIntvNoti" id="tempIntvNoti" name="tempIntvNoti" type="text" value="<?php echo $selectedTempIntvNoti; ?>" class="form-control" placeholder="Ex. 5 - Doar valori numerice intregi">
                    </div>
                </div>
                <br>
                
                <strong>Notificare Umiditate</strong>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputHumStatusNoti">Status notificare depasire prag umiditate</label> 
                        <select id="humStatusNoti" name="humStatusNoti" class="form-control"> 
                            <option <?php if($selectedHumStatusNoti == "on") echo "selected"?> value="on">Activ</option>
                            <option <?php if($selectedHumStatusNoti == "off" || $selectedHumStatusNoti == "") echo "selected"?> value="off">Dezactivat</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="inputHumPragNoti">Prag depasire umiditate (%)</label>
                        <input type="number"  min="0"  data-bind="value:humPragNoti" id="humPragNoti" name="humPragNoti" type="text" value="<?php echo $selectedHumPragNoti; ?>" class="form-control" placeholder="Ex. 20 - Doar valori numerice intregi">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputHumIntvNoti">Interval recurenta notificare (Minute)</label>
                        <input type="number"  min="0"  data-bind="value:humIntvNoti" id="humIntvNoti" name="humIntvNoti" type="text" value="<?php echo $selectedHumIntvNoti; ?>" class="form-control" placeholder="Ex. 5 - Doar valori numerice intregi">
                    </div>
                </div>
                <br>
                
            <strong>Notificare detectie lumina</strong>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputLightStatusNoti">Status notificare depasire prag Light</label> 
                    <select id="lightStatusNoti" name="lightStatusNoti" class="form-control"> 
                        <option <?php if($selectedLightStatusNoti == "on") echo "selected"?> value="on">Activ</option>
                        <option <?php if($selectedLightStatusNoti == "off") echo "selected"?> value="off">Dezactivat</option>
                    </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputLightPragNoti">Tip notificare prezenta lumina</label>                
                    <select id="inputLightPragNoti" name="lightPragNoti" class="form-control"> 
                        <option <?php if($selectedLightPragNoti== "1") echo "selected"?> value="1">Detectata</option>
                        <option <?php if($selectedLightPragNoti == "0" || $selectedLightPragNoti == "") echo "selected"?> value="0">Nedetectata</option>
                    </select>            
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputLightIntvNoti">Interval recurenta notificare (Minute)</label>
                    <input type="number"  min="0"  data-bind="value:lightIntvNoti" id="lightIntvNoti" name="lightIntvNoti" type="text" value="<?php echo $selectedLightIntvNoti; ?>" class="form-control" placeholder="Ex. 5 - Doar valori numerice intregi">
                </div>
            </div>
            <br>
            
            <strong>Notificare detectie gaze</strong>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputGasStatusNoti">Status notificare detectie gaze</label> 
                    <select id="gasStatusNoti" name="gasStatusNoti" class="form-control"> 
                        <option <?php if($selectedGasStatusNoti == "on") echo "selected"?> value="on">Activ</option>
                        <option <?php if($selectedGasStatusNoti == "off") echo "selected"?> value="off">Dezactivat</option>
                    </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputGasPragNoti">Tip notificare prezenta gaze</label>
                    <select id="inputGasPragNoti" name="gasPragNoti" class="form-control"> 
                        <option <?php if($selectedGasPragNoti== "1") echo "selected"?> value="1">Detectat</option>
                        <option <?php if($selectedGasPragNoti == "0" || $selectedGasPragNoti == "") echo "selected"?> value="0">Nedetectat</option>
                    </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputGasIntvNoti">Interval recurenta notificare (Minute)</label>
                    <input type="number"  min="0"  data-bind="value:gasIntvNoti" id="gasIntvNoti" name="gasIntvNoti" type="text" value="<?php echo $selectedGasIntvNoti; ?>" class="form-control" placeholder="Ex. 5 - Doar valori numerice intregi">
                </div>
            </div>
            <button type="submit" name="push-notification" class="btn btn-primary">Salveaza</button>
        </form>
    </div>
</div>
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