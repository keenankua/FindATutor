<?php 
$dbconn=db_connect();

			$query = "SELECT * FROM login_info WHERE email=$1 and password=$2;";
			        // echo("gets here");

			if(!$dbconn) return;

			// $query = "SELECT * FROM appuser WHERE username=$1 and password=$2;";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_REQUEST['email'], $_REQUEST['password']));

			if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			    // IF INPUT IS VALID


			        // $_SESSION['email'] = $user['exampleInputEmail2'];
			        // $_SESSION['active'] = $user['active'];
			        
			        // This is how we'll know the user is logged in
			        $_SESSION['logged_in'] = true;
			        header("location: home.php");
			}
			else{

			    $_SESSION['message'] = "User with that email doesn't exist!";
			    /*header("location: error.php");*/
			}

 ?>