<?php

require_once ('config.php') ;

// ログイン後経過日数によって強制ログアウト判断処理追加部


if ($_GET) {

	if ($array_get_value ($_GET, 'mode', "") ) {

		$match_array = null ;

			

	}

}

// for dump
//var_dump ( login ('admin', 'fg02v8dFsEja') ) ;
//var_dump ( session_status() );

require_once (HTML_HEADER_FILE) ;

if ( array_get_value ($_SESSION, 'user_name', "") ) {
	require_once (HTML_USERFORM_FILE ) ;
} else {
	require_once (HTML_LOGINFORM_FILE) ;
}

require_once (HTML_TOP_MENU_FILE) ;

require_once (HTML_MESSAGE_FILE) ;

require_once (HTML_FOOTER_FILE) ;

?>
