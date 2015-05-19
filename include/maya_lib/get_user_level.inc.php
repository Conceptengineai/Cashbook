<?php 

function get_user_level($user_name) {

	$db = new SQLite3 (DB_FILE) ;

	$query = 'SELECT authority_level FROM ( ' . 
		'SELECT authority_level, user_name FROM ' . 
		'user_level INNER JOIN user ON ' . 
		'user_level.user_id = user.user_id ) ' . 
		'WHERE user_name = ' . "'" . 
		$user_name . "' ;" ;

// for debug
//return $query ;

	$user_lv = $db -> querySingle ($query) ;

	return $user_lv ;

}

?>