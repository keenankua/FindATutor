<?php
  require_once 'db.php';
  $dbconn=db_connect();


  $email = pg_escape_string($dbconn,$_GET['email']);
  $firstname = pg_escape_string($dbconn,$_GET['firstname']);
  $lastname = pg_escape_string($dbconn,$_GET['lastname']);
  $lastname = rtrim($lastname,'/');
  if (isset($_GET['action']) && $_GET['action'] == "accept") { //accept tutor application

    if(isset($_GET['email']) && !empty($_GET['email'])){

      $query = "SELECT * FROM login_info WHERE email=$1;";
      $result = pg_prepare($dbconn, "check_email", $query);
      $result = pg_execute($dbconn, "check_email", array($email));

      if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
        $query = "UPDATE login_info SET is_tutor=1 WHERE email=$1;";
        $result = pg_prepare($dbconn, "set_tutor", $query);
        $result = pg_execute($dbconn, "set_tutor", array($email));

        $subject  =  "RE: New Tutor Application Form Submitted By $firstname ". "$lastname ";

        $body_accept = "Congratulations $firstname $lastname! You have been accepted as a tutor. Your account has been upgraded to have tutoring capabilities. Have fun teaching!\n";

        mail($email, $subject, $body_accept);

        echo "Tutor accepted. You can close this window now.\n";
      }
    }
    else {

      echo("Invalid parameters provided for tutor application!\n");
      //header("location: error.php");
    }

  }
  elseif (isset($_GET['action']) && $_GET['action'] == "reject") { //reject tutor application
    //send email to client about rejection
    $subject  =  "RE: New Tutor Application Form Submitted By $firstname ". "$lastname ";
    $body_reject = "Hello $firstname $lastname. Unfortunately, your tutor application has been rejected based on our evaluation. We hope you understand. Thank you for your time in this process.\n";
    mail($email, $subject, $body_reject);

    echo "Tutor rejected. You can close this window now.\n";
  }

?>
