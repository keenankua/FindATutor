<?php
require_once 'db.php';
session_save_path("sess");
session_start();
ini_set('display_errors', 'On');

$dbconn = db_connect();
//echo($_GET['email']);
//if(!$dbconn) return false;
//header("location: index.php");
if(isset($_GET['email']) && !empty($_GET['email'])){
  $email = pg_escape_string($dbconn,$_GET['email']);
  echo($email);
  $query = "SELECT * FROM login_info WHERE email=$1;";
  $result = pg_prepare($dbconn, "check_email", $query);
  $result = pg_execute($dbconn, "check_email", array($email));

  if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
    $query = "UPDATE login_info SET is_verified=1 WHERE email=$1;";
    $result = pg_prepare($dbconn, "set_verified", $query);
    $result = pg_execute($dbconn, "set_verified", array($email));
    header("location: index.php");
  }
}
else {
  $_SESSION['message'] = "Invalid parameters provided for account verification!";
  echo($_SESSION['message']);
  //header("location: error.php");
}


 ?>
