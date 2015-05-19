<?php
// written by maya minatsuki
// made this file : 2013.04.11
// last mod. : 2015.05.19
//


// 連想配列の要素が存在するかチェックする関数
require_once ( SCRIPT_DIR . "include/unoh_lib/array_get_value.inc.php" ) ;

require_once ( MAYALIB_DIR . 'access_log_writer.inc.php' ) ;

require_once ( MAYALIB_DIR . 'error_log_writer.inc.php' ) ;

if ( ! function_exists ('sqlite_escape_string') ) {
	require_once ( MAYALIB_DIR . 'sqlite_escape_string.inc.php' ) ;
}

require_once ( MAYALIB_DIR . 'hashpw.inc.php' ) ;

require_once ( MAYALIB_DIR . 'login.inc.php' ) ;

require_once ( MAYALIB_DIR . 'get_user_level.inc.php' ) ;

?>
