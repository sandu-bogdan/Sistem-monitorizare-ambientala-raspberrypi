<!DOCTYPE html>
<!-- Script for datetime picker -->
<script src="js/jquery.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>

<html lang="ro">
  <?php require "includes/header.php"; ?>
  <?php
  $error_cod = $_GET['error'];
  if($error_cod != "")
  $error = true;
  switch ($error_cod){
    case 1:
      $error_result = 'Data aleasa este mai mare decat data curenta! Te rog sa alegi alta data!';
      break;
    case 2:
      $error_result = 'Formatul pentru data introdusa, este incorect!';
      break;
    case 3:
      $error_result = 'Nu a fost selectata data!';
      break;
  }
  ?>
  
  <body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-body">
          <span class="h3 mb-0 text-gray-800">Istoric parametrii</span><br>
          Istoric parametri urmariti, aici se pot urmari date istorice inregistrate in platforma.
        </div>

        <form style="padding:3%" action="history-result.php" method="post" enctype="multipart/form-data">
          <!-- Error reporting -->
          <?php if($error == true) echo '<div class="alert alert-danger" role="alert">'.$error_result.'</div>'; ?>
          <?php if( $_GET['status'] == 'success'): echo '<div class="alert alert-success" role="alert"> Configuratia a fost salvata cu succes! </div>'; endif; ?>
            <center>
            <div class="form-group col-md-6">
              <label for="date">Selecteaza ziua pentru afisare istoric informatii</label> 
              <input class="form-control" type="text" name="date" id="date" placeholder="Format data: AAAA-LL-ZZ"/>
            </div>
            <button type="submit" name="history" class="btn btn-primary">Vezi informatiile inregistrate <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </center>
        </form>
        <script>
        $('#date').datetimepicker({
          format: 'YYYY-MM-DD'
        });
        </script>
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
 <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="js/nav.js"></script>
</html>