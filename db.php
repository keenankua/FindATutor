<?php
	require_once "dbconnect_string.php";

  function db_connect(){
    global $g_dbconnect_string;
    $dbconn = pg_connect($g_dbconnect_string);
    if(!$dbconn){
			$system_errors[] = "Can't connect to the database.";
			return null;
		} else return $dbconn;
}
