<?php

function login ($user_name, $pw) {

	$db = new SQLite3 (DB_FILE) ;

// for debug
//$user_name = 'boo' ;

	$query = 'SELECT user_pw_h ' . 
		'FROM user INNER JOIN user_pw ' . 
		'ON user.user_id = user_pw.user_id ' . 
		'WHERE user_name = ' . "'" . 
		$user_name . "' ;" ; 

// for debug
//return $query ;

	$db_pw_h = $db -> querySingle ($query) ;

// for debug
//return $pw_h ;

	if ($db_pw_h) {

		if (password_verify ($pw, $db_pw_h) ) {

// for debug			
return 1 ;

		}
	}

	// login failed.
	return null ;

}
?>