<?php
if( is_admin() ){
	/** @noinspection PhpIncludeInspection */
	require_once( get_theme_file_path( 'advance/inc/pro/pro_admin.php' ));
	/** @noinspection PhpIncludeInspection */
	require_once( get_theme_file_path( 'advance/inc/pro/envy_admin.php' ));
}
/** @noinspection PhpIncludeInspection */
require_once( get_theme_file_path( 'advance/inc/pro/pro_fe.php' ));