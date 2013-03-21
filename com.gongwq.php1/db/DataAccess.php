<?php
class DataAccess {
	
	private $db;
	private $query;
	
	/**
	 * The DataAccess construtor
	 * @param $host the db server address
	 * @param $user the user name
	 * @param $pwd the password
	 * @param $dbname the db name
	 * 
	 */
	function __construct($host, $user, $pwd, $dbname) {
		$this->db = mysql_pconnect($host, $user, $pwd);
		mysql_select_db($dbname);
	}
	
	/**
	 * Execute the sql statment of fetching.
	 * @param unknown $sql_sta
	 */
	function fetch($sql_sta) {
		$this->query = mysql_unbuffered_query($sql_sta, $this->db);
	}
	
	function getRow() {
		if ($row = mysql_fetch_array($this->query, MYSQL_ASSOC)) {
			return $row;
		} else {
			return false;
		}
	}
}