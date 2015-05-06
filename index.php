<?php

require_once ('config.php') ;

session_start () ;

if ($_GET) {

	if ($array_get_value ($_GET, 'mode', "") ) {

		$match_array = null ;

			

	}

}

// for dump
//var_dump ( login ('admin', 'fg02v8dFsEja') ) ;


require_once (HTML_HEADER_FILE) ;

if ( array_get_value ($_SESSION, 'logined', "") ) {
	require_once (HTML_USERFORM_FILE ) ;
} else {
	require_once (HTML_LOGINFORM_FILE) ;
}

require_once (HTML_TOP_MENU_FILE) ;

require_once (HTML_MESSAGE_FILE) ;

require_once (HTML_FOOTER_FILE) ;

?>
