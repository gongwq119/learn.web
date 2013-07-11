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
	
	private function execute($sql_sta) {
		$this->db->select_db('mydb');
		return $this->db->query($sql_sta);
	}
	
	
	/**
	 * 
	 * @param unknown $sql_sta
	 */
	function getRowNumber($sql_sta) {
		$result = $this->execute($sql_sta);
		$num_results = $result->num_rows;
		echo $num_results;
	}
	
	/**
	 * 
	 * @param unknown $item_id
	 * @return mixed
	 */
	function getItem($item_id) {
		$sql = 'SELECT * FROM mydb.items WHERE id=' . $item_id;
		return $this->execute($sql);
	}
	
	/**
	 * Select the number of items from db
	 * @param unknown $sql_sta
	 * @param unknown $amount
	 */
	function selectLimit($sql_sta, $amount, $start_page = 0) {
		if ($start_page == 0) {
			$sql_sta .= 'LIMIT ' . $amount;
		} else {
			$sql_sta .= 'LIMIT ' . $start_page . ', ' . $amount;
		}
		return $this->execute($sql_sta);
	}
	
	/**
	 * 
	 * @param unknown $username
	 * @param unknown $passw0rd
	 */
	function getAdminUserId($username, $password) {
		$sql = 'SELECT user_id FROM mydb.admin_user WHERE user_name=\'' . $username . '\' AND ' . 'password=\'' . md5($password) . '\'';
		return $this->execute($sql);
	}
	
	/**
	 * 
	 * @param unknown $table
	 * @param unknown $array
	 */
	function insertRow($table, $array) {
		$sql = 'INSERT INTO ' .  $table . ' ';
		$key_string = '(';
		$value_string = 'VALUES (';
		foreach ($array as $k=>$v) {
			$key_string = $key_string . $k . ', ';
			$value_string = $value_string . "'$v', ";
		}
		$key_string = substr($key_string, 0, strlen($key_string)-2) . ') ';
		$value_string = substr($value_string, 0, strlen($value_string)-2) . ')';
		$sql = $sql . $key_string . $value_string;
		$this->execute($sql);
		return $this->db->insert_id;
	}
}

?>