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
<?php
class simpleView {
	
	private $model;
	private $htmlOutput; //the html code
	
	/**
	 * the constructor
	 * @param unknown $model
	 */
	function __construct($model) {
		$this->model = $model;
	}
	
	/**
	 * Output the final html code.
	 */
	function display() {
		echo $this->htmlOutput;
	}
}