<?php
	include("_variables.php");
	$con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
	if(!$con or mysqli_connect_error()) {
		echo mysqli_error($con);
		# code...
	}else {
		$con->set_charset("utf8");
		$con->query("SET lc_tine_names = 'nl_NL';");
	}

//waarvoor word deze functie gebruikt ?????

//if (!function_exists('dbp')) {
//    // ... proceed to declare your function
//    function dbp($firstName){
//        global $con, $query1;
//        $firstName = mysqli_escape_string($con, $query1);
//    }
//
//}


?>
