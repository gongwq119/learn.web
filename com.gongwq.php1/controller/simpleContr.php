<?php
class simpleContr {
	
	private $model;
	private $view;
	
	/**
	 * The construct
	 * 
	 */
	function __construct($dao) {
		$this->model = new simpleModel($dao);
	}
	
	function getView() {
		return $this->view;
	}
}