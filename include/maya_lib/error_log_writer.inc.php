<?php

function error_log_writer ($err_level, $err_message) {

// for debug
//return array ($err_level, $err_message) ;

	$db = new SQLite3 (DB_FILE) ;

	$query = 'INSERT INTO error_log ' . 
		'( err_level, err_message ) ' . 
		'VALUES ( ' . 
		sqlite_escape_string ($err_level) . ", '" . 
		sqlite_escape_string ($err_message) . 
		"' ) ;" ;

// for debug
//return $query ;

	$db_exec = $db -> exec ($query) ;
	
	if ( ! $db_exec ) {
		exit($db -> lastErrorMsg () ) ;
	}

	return 1 ;

}
?>
