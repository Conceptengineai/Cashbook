<?php

function hashpw ($pw) {

	if ( preg_match ("/[^0-9]/u", PW_HASH_COST) ) {
		error_log_writer (1,'PW_HASH_COST is not number !') ;
		exit ('PW_HASH_COST is not number !') ;
	}

// for debug
//return $pw ;

	$pw_h = password_hash ($pw, PASSWORD_BCRYPT, ['cost' => PW_HASH_COST]) ;

	return $pw_h ;

}
?>