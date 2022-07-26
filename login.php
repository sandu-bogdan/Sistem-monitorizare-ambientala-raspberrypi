<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to index page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
// Include config file
require_once "includes/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Check if username is empty
  if(empty(trim($_POST["username"]))){
    $username_err = "Este necesar sa introduci numele de utilizator.";
  }
  else{
    $username = trim($_POST["username"]);
  }
  // Check if password is empty
  if(empty(trim($_POST["password"]))){
    $password_err = "Este necesar sa introduci parola.";
  }
  else{
    $password = trim($_POST["password"]);
  }
  // Validate credentials
  if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      // Set parameters
      $param_username = $username;
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);
        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){                    
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password)){
              // Password is correct, so start a new session
              session_start();
              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;                            
              // Redirect user to index page
              header("location: index.php");
            } 
            else{
              // Password is not valid, display a generic error message
              $login_err = "Nume de utilizator sau parola invalide.";
            }
          }
        } 
        else{
          // Username doesn't exist, display a generic error message
          $login_err = "Nume de utilizator sau parola invalide.";
        }
      } 
      else{
        echo "Oops! Te rog sa incerci mai tarziu.";
      }
      // Close statement
      mysqli_stmt_close($stmt);
    }
  }
  // Close connection
  mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">
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
    <link href=css/login.css rel="stylesheet">
</head>
  <body>
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2" style="background-image: url('img/bg_1.jpg');"></div>
      <div class="contents order-2 order-md-1">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
              <h3>Autenficare </h3> <br>
              <p class="mb-4">Autenficare in centrul de monitorizare ambientala.</p>
              <?php if( $_GET['password-changed'] == '1'): echo '<div class="alert alert-success" role="alert"> Parola a fost schimbata cu succes! Este necesara autentificarea cu noua parola!</div>'; endif; ?>
              <?php if( !empty($login_err)) echo '<div class="alert alert-danger" role="alert">'.$login_err.'</div>';?>
              
              <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group first">
                <label for="username">Utilizator</label>
                <input type="text" name="username" placeholder="Utilizator..." class="form-control <?php if(!empty($username_err)) echo 'is-invalid';?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php if(!empty($username_err)) echo $username_err;?></span>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Parola</label>
                <input type="password" name="password" placeholder="Parola..." class="form-control <?php if(!empty($password_err)) echo 'is-invalid';?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
              </div>
              <input type="submit" value="Autentificare" class="btn btn-block btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>