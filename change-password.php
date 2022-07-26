<!DOCTYPE html>
<html lang="en">
  <?php
  include("includes/db.php");
  require "includes/header.php";
  require_once "includes/config.php"; 
   
  $new_password = $confirm_password = ""; $new_password_err = $confirm_password_err = ""; 
  
  // Processing form data when form is submitted 
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["new_password"]))) {
      $new_password_err = "Te rog sa introduci noua parola.";
    } 
    elseif(strlen(trim($_POST["new_password"])) < 6) {
      $new_password_err = "Noua parola trebuie sa aibe cel putin 6 caractere.";
    }
    else {
      $new_password = trim($_POST["new_password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
      $confirm_password_err = "Te rog sa confirmi noua parola.";
    }
    else {
      $confirm_password = trim($_POST["confirm_password"]);
      if(empty($new_password_err) && ($new_password != $confirm_password)){
        $confirm_password_err = "Cele doua parole nu se potrivesc.";
      }
    }
    
    if(empty($new_password_err) && empty($confirm_password_err)){
      $sql = "UPDATE users SET password = ? WHERE id = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
        $stmt->bind_param("si", $param_password, $param_id);
        $param_password = password_hash($new_password, PASSWORD_DEFAULT);
        $param_id = $_SESSION["id"];
        if(mysqli_stmt_execute($stmt)){
          session_destroy();
          echo "<meta http-equiv='refresh' content='0;url= login.php?password-changed=1'>";
          exit();
        }
        else {
          echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
      }
    }
    mysqli_close($link); 
  }
  ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <span class="h3 mb-0 text-gray-800">Schimba parola</span><br>
    </div>
    
    <form style="padding:3%" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="inputPassword">Noua parola</label> <strong><?php if(!empty($new_password_err)) echo $new_password_err; ?></strong>
      <input type="password" name="new_password" class="form-control" placeholder="Noua parola">
    </div>

    <div class="form-group">
      <label for="inputVerifyPassword">Verificare parola</label> <strong><?php if(!empty($confirm_password_err)) echo $confirm_password_err; ?></strong>
      <input type="password" name="confirm_password" class="form-control" placeholder="Verificare noua parola">
    </div>
    
    <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
  </form>
</div>
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
