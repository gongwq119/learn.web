<?php
class simpleModel {
	
	private $dao; // DataAccess instance
	
	/**
	 * 
	 */
	function __construct(DataAccess $dao) {
		$this->dao = $dao;
	}
	
	/**
	 * 
	 */
	function listALL() {
		$this->dao->fetch("SELECT * FROM php");
	}
}