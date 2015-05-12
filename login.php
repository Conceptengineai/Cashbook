<?php

require_once ('config.php') ;


$message = null ;

if ($_POST) {

//var_dump ($_POST) ;

	if (array_get_value ($_POST, 'user_name', "") and 
		array_get_value ($_POST, 'user_pw', "") ) {

// for debug
// var_dump ( htmlspecialchars (login (sqlite_escape_string 
// ($_POST ['user_name']), $_POST ['user_pw']) ) ) ;
// exit ;

		if (login (sqlite_escape_string 
			($_POST ['user_name']), 
			$_POST ['user_pw']) ) {

			$message .= "login success" ;
		}
		else {

			$message .= "login failed." ;
		}

	}
	else {

		$message .= "user_name and user_password required." ;
	}
}

require_once ('index.php') ;

?>