<?php

require_once ('config.php') ;


$message = null ;

if ($_POST) {

//var_dump ($_POST) ;

	if (array_get_value ($_POST, 'user_name', "") and 
		array_get_value ($_POST, 'user_pw', "") ) {


		$login_res = login (sqlite_escape_string 
			($_POST ['user_name']), 
			$_POST ['user_pw']) ;

// for debug
//var_dump ($login_res) ;
//exit ;


		if ($login_res == 1) {

			$message .= "login success" ;
		}
		else if ($login_res == 9) {

			$message .= "Sorry, login rejected." ;
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