<?php
/**
 * Author:WQ.Gong
 * mysql 连接
 * 
 */

if (!defined('FROM_INDEX'))
{
	die('Hacking attempt');
}

class lib_mysql {
	
	var $settings   = array();
	
	function __construct($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'gbk', $pconnect = 0, $quiet = 0) {
		;
	}
	
	function lib_mysql($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'gbk', $pconnect = 0, $quiet = 0) {
		if (defined('ROOT_PATH') && !$this->root_path)
		{
			$this->root_path = ROOT_PATH;
		}
		
		if ($quiet)
		{
			$this->connect($dbhost, $dbuser, $dbpw, $dbname, $charset, $pconnect, $quiet);
		}
		else
		{
			$this->settings = array(
					'dbhost'   => $dbhost,
					'dbuser'   => $dbuser,
					'dbpw'     => $dbpw,
					'dbname'   => $dbname,
					'charset'  => $charset,
					'pconnect' => $pconnect
			);
		}
	}
}

?>