<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["transcripts"]["name"]);
$uploadOk = 1;
$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$message = "form received";
echo("<script type='text/javascript'>alert('$message');</script>");
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
                      "\nPlease use this link to ACCEPT the tutor application:\nhttps://cslinux.utm.utoronto.ca/~gaglanim/test/validateTutor.php/?action=accept&email=$email&firstname=$firstname&lastname=$lastname\n\n\nPlease use this link to REJECT the tutor application:\nhttps://cslinux.utm.utoronto.ca/~gaglanim/test/validateTutor.php/?action=reject&email=$email&firstname=$firstname&lastname=$lastname";
          mail($to_email, $subject, $body);
          header("location: howitworks.php");
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
}

?>
