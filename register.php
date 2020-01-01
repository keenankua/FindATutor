<?php
      $firstname = $_POST['firstname'];
        $lastname =$_POST['lastname'] ;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
       $dbconn = db_connect();
        if(!$dbconn) return false;
          $password = pg_escape_string($dbconn,$password);
          $email = pg_escape_string($dbconn,$email);
          $firstname = pg_escape_string($dbconn,$firstname);
          $lastname = pg_escape_string($dbconn,$lastname);

        $query = "SELECT * FROM login_info WHERE Email=$1;";
          $result = pg_prepare($dbconn, "validate_email", $query);
          $result = pg_execute($dbconn, "validate_email", array($email));

        if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
          array_push($GLOBALS['errors'],"user with this email already exists, enter a different email or login");
        }else{

        $query = "INSERT INTO login_info(FirstName, LastName, Password, Email) VALUES($1, $2, $3, $4);";
        $result = pg_prepare($dbconn, "register_user", $query);
        $result = pg_execute($dbconn, "register_user", array($firstname, $lastname,
          $password, $email));
        $_SESSION['logged_in'] = true;
        // $_SESSION['message'] =
        //
        //        "Confirmation link has been sent to $email, please verify
        //        your account by clicking on the link in the message!";

      // Send registration confirmation link (verify.php)
      $subject = 'Account Verification ( Tutor app )';
      $email_body = '
      Hello '.$firstname.',

      Thank you choosing our Tutor app!

      Please use this link to activate your account:

      https://cslinux.utm.utoronto.ca/~gaglanim/test/verify.php?email='.$email;

      mail($email, $subject, $email_body);
      header("location: home.php");
    }

?>
