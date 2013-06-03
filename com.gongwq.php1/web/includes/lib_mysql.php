<?php
/**
 * Author:WQ.Gong
 * mysql 连接
 * 
 */
class lib_mysql {

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
	 * 
	 */
	public function setCharset() {
		$this->db->set_charset('utf8');
	} 
	/**
	 * Execute the sql statment of fetching.
	 * @param unknown $sql_sta
	 */
	private function execute($sql_sta) {
		$this->db->select_db('mydb');
		// 		$this->query = $this->db->query($this->db, $query);
		return $this->db->query($sql_sta);
	}
	
	function getRowNumber($sql_sta) {
		// 		if ($row = mysql_fetch_array($this->query, MYSQL_ASSOC)) {
		// 			return $row;
		// 		} else {
		// 			return false;
		// 		}
		$result = $this->execute($sql_sta);
		$num_results = $result->num_rows;
		echo $num_results;
	}
	
	function getItem($item_id) {
		$sql = 'SELECT * FROM mydb.items WHERE id=' . $item_id;
		return $this->execute($sql);
	}
}

?>