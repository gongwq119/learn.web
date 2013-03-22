<?php
class simpleView {
	
	private $model;
	private $outputHtml;
	
	function __construct($model) {
		$this->model = $model;
	}
	
	function display() {
		echo $this->outputHtml;
	}
}