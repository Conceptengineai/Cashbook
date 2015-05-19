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


			if ( ! defined ('DONOT_WRITE_LOGIN_HISTORY') ) {

				$query = 'INSERT INTO login_history ' . 
					'(user_id) SELECT user_id ' . 
					'FROM user WHERE user_name = ' . "'" . 
					$user_name . "' ;" ;

// for debug
//return $query ;

				$insert_res = 
					$db -> exec ($query) ;

				// このやり方では DB に書き込めない場合に apache (php)
				// 側でエラーを画面出力して終了してしまう
				if ( ! $insert_res ) {
					error_log_writer ( 1, 
					'login_history error, ' . 
					sqlite_escape_string ( 
					$db -> lastErrorMsg ()
					) ) ;
				}

			}

			$query = 'SELECT screen_name FROM ' . 
				"user WHERE user_name = '" . 
				$user_name . "' ;" ;

			$db_screen_name = 
				$db -> querySingle ($query) ;

// for debug
//return session_status ();
//return $db_screen_name ;

			if (session_status () ) {
			// PHP_SESSION_ACTIVE	: 2
			// PHP_SESSION_NONE		: 1
			// PHP_SESSION_DISABLED	: 0

				// セッションハイジャック対策
				session_regenerate_id (true) ;

				$_SESSION ['user_name'] = 
					$user_name ;

				if ($db_screen_name) {
					$_SESSION ['screen_name'] = 
						$db_screen_name ;
				}

// for debug
return 1;

			}

// for debug			
//return 1 ;

		}
	}

	// login failed.
	return null ;

}
?>