<?php

require_once ('config.php') ;

if ($_POST) {

//var_dump ($_POST) ;

	if (array_get_value ($_POST, 'user_name', "") and 
		array_get_value ($_POST, 'user_pw', "") ) {

		if (login (sqlite_escape_string 
			($_POST ['user_name']), 
			$_POST ['user_pw']) ) {

			echo true ;
		}
		else {

			echo false ;
		}

	}
	else {

		echo false ;
	}
}

//require_once ('index.php') ;

?>