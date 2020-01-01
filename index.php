<?php
    ini_set('display_errors', 'On');
  /* Main page with two forms: sign up and log in */
    require 'db.php';
    require 'sms.php';
    session_save_path("sess");
    session_start();
    $dbconn = db_connect();
    $errors=array();
    $view="first.php";


  if(!isset($_SESSION['state'])){
   
    $_SESSION['state']='default';
    $view="first.php";
  }


function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo ("<script>console.log( 'Debug Objects: " . $output . "' );</script>");
}

if (isset($_GET['operation']))
{

  $_SESSION['state'] = $_GET['operation'];
}


  switch($_SESSION['state']){
    case "logout":
      session_destroy();
      $view="first.php";

      break;
    case "default":
      $view="first.php";

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (isset($_POST['login'])) { 
          //user logging in
            // the view we display by default
            // check if submit or not
            $query = "SELECT * FROM login_info WHERE email=$1 and password=$2;";
            // echo("gets here");

            if(!$dbconn) return;

            // $query = "SELECT * FROM appuser WHERE username=$1 and password=$2;";
            $result = pg_prepare($dbconn, "", $query);
            $result = pg_execute($dbconn, "", array($_REQUEST['email'], $_REQUEST['password']));

            if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
                // IF INPUT IS VALID


                // $_SESSION['email'] = $user['email'];

                // $_SESSION['active'] = $user['active'];

                // This is how we'll know the user is logged in
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $_REQUEST['email'];
                $view="home.php";   //tutordashboard
                $_SESSION['state']="home"; // tutorForm                                                                                                                           
                             echo ("<script>window.alert('emailno:wwwww ".$_SESSION['email']. "  ');</script>");

            }
            else{

                $_SESSION['message'] = "User with that email doesn't exist!";
                /*header("location: error.php");*/
            }
          }
        elseif (isset($_POST['register'])) { //user registering
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


          } 
        }
      }
      break;
    case "home":
      $view="home.php";
      debug_to_console( "Test1223" );

      break;
    case "becomeatutor":
      $view="becomeatutor.php";
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["transcripts"]["name"]);
      $uploadOk = 1;
      $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // $message = "form received";
      // echo("<script type='text/javascript'>alert('$message');</script>");
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_REQUEST['submit'])){

          if (move_uploaded_file($_FILES["transcripts"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["transcripts"]["name"]). " has been uploaded.";
              $firstname = $_REQUEST['firstname'];
              $lastname = $_REQUEST['lastname'];
              $email = $_REQUEST['email'];
              $education = $_REQUEST['education'];
              $to_email = 'tutorRobot301@gmail.com';
              $subject  =  "New Tutor Application Form Submitted By $firstname ". "$lastname ";
              $body     =  "$firstname $lastname has applied to become a tutor.\n".
                          "Here is the information of $firstname :\n".
                          "First name: $firstname \n".
                          "Last name: $lastname \n".
                          "Email: $email \n".
                          "Highest Level of Education: $education \n".
                          "Transcripts are attached \n".
                          "\nPlease use this link to ACCEPT the tutor application:\nhttps://cslinux.utm.utoronto.ca/~buttshe1/Userstory3/validateTutor.php/?action=accept&email=$email&firstname=$firstname&lastname=$lastname\n\n\nPlease use this link to REJECT the tutor application:\nhttps://cslinux.utm.utoronto.ca/~buttshe1/Userstory3/validateTutor.php/?action=reject&email=$email&firstname=$firstname&lastname=$lastname";
              mail($to_email, $subject, $body);
              //POST A SUCCESS MESSAGE HERE THEN PROCEED TO THISE PAGE!!
              $_SESSION['state']="home"; // 
              $view = "home.php";
              // header("location: howitworks.php");
          } else {
             // $view="becomeatutor.php";
          }
        }
      }

      break;
    case "favourites":
      $view="favourites.php";
      break;
    
    case "history":
      $view="history.php";
      break;

    case "settings":
      $view="settings.php";
      break;
    case "howitworks":
      $view="howitworks.php";
      break;

    case "logout":
      $_SESSION['state']='default';
      // $view="first.php";
      // unset($_GET['operation']);
      session_destroy();

      // header("Refresh:0");
      // header("location: first.php");
      break;

    case "findatutor":
      $view="findatutor.php";
      $email=$_SESSION['email'];
      $subject = "";  $online=0; $inPerson=0;
      $gradelevel=16;
      if(isset($_REQUEST['findtut'])){

        $rate=$_REQUEST['rate'];
        $maxDist=$_REQUEST['maxDist'];
        $postalCode=$_REQUEST['postalCode'];
        
        if (isset($_REQUEST['subject'])) { 
          $subject = $_REQUEST['subject']; // name of the subject 
          // echo ("<script>window.alert('LOGIN INFORMATION: ".$subject . "  ');</script>");

        }else{
          //raise error
        }

         if (isset($_REQUEST['gradeLevel'])) {
          $gradelevel = $_REQUEST['gradeLevel']; // Year # (Ex. 9,10,11 ... 16)
        }else{
          //raise error0
        }
        if(isset($_REQUEST['online'])){
            $online=1;
          }
          if(isset($_REQUEST['inperson'])){
              $inPerson=1;
          }

        $query = "SELECT * FROM tutor_information WHERE $1 >= $2 AND (Online=$3 OR InPerson=$4) AND rate <= $5;";
        $result = pg_prepare($dbconn, "find_match_tutor", $query);
        $result = pg_execute($dbconn, "find_match_tutor", array($subject, $gradelevel, $online, $inPerson, $rate));

        if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            echo ("<script>window.alert('Found a Tutor ! ');</script>");
            $tutoremail=$row["email"];
            $query = "DELETE FROM tutor_information WHERE email=$1;";
            $result = pg_prepare($dbconn, "delete_matched_tutor", $query);
            $result = pg_execute($dbconn, "delete_matched_tutor", array($tutoremail));

            //incase student already in db
            $query = "DELETE FROM student_information WHERE email=$1;";
            $result = pg_prepare($dbconn, "delete_studentForm", $query);
            $result = pg_execute($dbconn, "delete_studentForm", array($email));
            
              // Also notify student and tutor with texts
            send_messages("+16474681000", "+14169921383");
        }else{
          $query = "SELECT * FROM student_information WHERE Email=$1;";
          $result = pg_prepare($dbconn, "validate_email", $query);
          $result = pg_execute($dbconn, "validate_email", array($email));


          if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){

            $query = "UPDATE student_information SET Online=$1, InPerson=$2, subject=$3,gradelevel=$4, Rate=$5, Distance=$6, PostalCode =$7 WHERE email=$8;";
            $result = pg_prepare($dbconn, "update", $query);
            $result = pg_execute($dbconn, "update", array($online,$inPerson,$subject,$gradelevel,$rate,$maxDist,$postalCode,$email));

          }else{

            $query = "INSERT INTO student_information VALUES ($1, $2, $3, $4, $5, $6, $7, $8);";
            $result = pg_prepare($dbconn, "update_studentForm", $query);
            $result = pg_query_params($dbconn, $query, array($email,$online,$inPerson,$subject,$gradelevel,$rate,$maxDist,$postalCode));

          }
        }  
      }
      break;

    case "tutorForm":
      $email=$_SESSION['email'];
      $query = "SELECT is_tutor FROM login_info WHERE email=$1;";
      $result = pg_prepare($dbconn, "is_tutor", $query);
      $result = pg_execute($dbconn, "is_tutor", array($email));
      if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
        //not a tutor
        if($row["is_tutor"] == 0){
          echo ("<script>window.alert('You need to be a tutor in order to view the tutor dashboard. Apply to become a tutor!');</script>");
          $view="becomeatutor.php";
          $_SESSION['state']='becomeatutor';
          unset($_GET['operation']);
          break;
        }
        //is a tutor, can access the tutor dashboard
        else{
      $view="tutordashboard.php";
      // echo ("<script>window.alert('sometext');</script>");
     
        if(isset($_REQUEST['avail'])){
          $online=0; 
          $subjects = array();
          $subjects["math"]=0;  $subjects["physics"]= 0; $subjects["biology"]= 0;
          $inPerson=0;  $subjects["english"]= 0; $subjects["french"]= 0; $subjects["spanish"]= 0; $subjects["chemistry"]=0;
          
          $rate=$_REQUEST['rate'];
          $maxDist=$_REQUEST['maxDist'];
          $postalCode=$_REQUEST['postalCode'];
          
          if(isset($_REQUEST['math'])){

            $subjects["math"]=$_REQUEST['mathCap'];
          }
      
           if(isset($_REQUEST['physics'])){
            $subjects["physics"]=$_REQUEST['physicsCap'];
          }
           if(isset($_REQUEST['biology'])){
            $subjects["biology"]=$_REQUEST['biologyCap'];
          }
           if(isset($_REQUEST['english'])){
            $subjects["english"]=$_REQUEST['englishCap'];
          }
           if(isset($_REQUEST['french'])){
            $subjects["french"]=$_REQUEST['frenchCap'];
          }
          if(isset($_REQUEST['chemistry'])){
           $subjects["chemistry"]=$_REQUEST['chemistryCap'];
          }
           if(isset($_REQUEST['spanish'])){
            $subjects["spanish"]=$_REQUEST['spanishCap'];
          }
          
          if(isset($_REQUEST['online'])){
            $online=1;
          }
          if(isset($_REQUEST['inperson'])){
              $inPerson=1;
          }
          $studentEmail="";
          // assuming no errors until this point
          foreach($subjects as $subject => $gradelevel) {
              if($gradelevel!=0){
                $query = "SELECT * FROM student_information WHERE subject=$1 AND (Online=$2 OR InPerson=$3) AND Rate >= $4 AND gradelevel <= $5;";
                $result = pg_prepare($dbconn, "find_student", $query);
                $result = pg_execute($dbconn, "find_student", array($subject,$online,$inPerson,$rate,$gradelevel));
                if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
                  $studentEmail=$row["email"];
                  break;
                }

              }
          }
          if($studentEmail!=""){
              echo ("<script>window.alert('Found a student! ');</script>");
              $query = "DELETE FROM student_information WHERE email=$1;";
              $result = pg_prepare($dbconn, "delete_matched_student", $query);
              $result = pg_execute($dbconn, "delete_matched_student", array($studentEmail));

              //incase already in db
              $query = "DELETE FROM tutor_information WHERE Email=$1;";
              $result = pg_prepare($dbconn, "delete_tutorForm", $query);
              $result = pg_execute($dbconn, "delete_tutorForm", array($email));
              // Also notify student and tutor with texts
              send_messages("+16474681000", "+14169921383");

          }else{

          $query = "SELECT * FROM tutor_information WHERE Email=$1;";
          $result = pg_prepare($dbconn, "validate_email_tutor", $query);
          $result = pg_execute($dbconn, "validate_email_tutor", array($email));

         if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){

            $query = "UPDATE tutor_information
            SET math=$1, physics=$2, chemistry=$3, biology=$4, english=$5, french=$6, spanish=$7, rate=$8, distance=$9, postalcode=$10,online=$11,inperson=$12 WHERE email=$13;";
             $result = pg_prepare($dbconn, "update_tutorForm", $query);
             $result = pg_execute($dbconn, "update_tutorForm", array($subjects["math"],$subjects["physics"],$subjects["chemistry"],$subjects["biology"],$subjects["english"],$subjects["french"],$subjects["spanish"],$rate,$maxDist,$postalCode,$online,$inPerson,$email));
          }else{

            $query = "INSERT into tutor_information VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13);";
            $result = pg_prepare($dbconn, "insert_tutorForm", $query);

            $result = pg_execute($dbconn, "insert_tutorForm", array($email,$online,$inPerson,$subjects["math"],$subjects["physics"],$subjects["chemistry"],$subjects["biology"],$subjects["english"],$subjects["french"],$subjects["spanish"],$rate,$maxDist,$postalCode));
          }
      }
        }elseif(isset($_REQUEST['unavail'])){
          $query = "SELECT * FROM tutor_information WHERE Email=$1;";
          $result = pg_prepare($dbconn, "validate_email", $query);
          $result = pg_execute($dbconn, "validate_email", array($email));

          if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $query = "DELETE FROM tutor_information WHERE Email=$1;";
             $result = pg_prepare($dbconn, "delete_tutorForm", $query);
             $result = pg_execute($dbconn, "delete_tutorForm", array($email));
          }
        }
        
    break;
      }
    }
   }
require_once "$view";
?>