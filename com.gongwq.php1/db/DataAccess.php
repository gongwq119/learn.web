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
		$this->db = new mysqli($host, $user, $pwd, $dbname);
	}
	
	/**
	 * Execute the sql statment of fetching.
	 * @param unknown $sql_sta
	 */
	private function fetch($sql_sta) {
		$this->db->select_db('users');
// 		$this->query = $this->db->query($this->db, $query);
		return $this->db->query($sql_sta);
	}
	
	function getRow($sql_sta) {
// 		if ($row = mysql_fetch_array($this->query, MYSQL_ASSOC)) {
// 			return $row;
// 		} else {
// 			return false;
// 		}
		$result = $this->fetch($sql_sta);
		$num_results = $result->num_rows;
		echo $num_results;
	}
}