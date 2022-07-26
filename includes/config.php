<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$server = 'localhost';
$username = 'user';
$password = 'password';
$db_name = 'database';
/* Attempt to connect to MySQL database */
$link = mysqli_connect($server,$username,$password,$db_name);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
