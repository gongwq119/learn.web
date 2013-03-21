<?php
class SimpleClass {
	
	public $var1 = "hello world";
	
	public $var2 = <<<EOD
Hello world
EOD;
	const constant1 = "I am constant";
	
	public function run() {
		echo 'run is run';
		;
	}
}

// echo SimpleClass::constant1;

class sonClass extends SimpleClass {
	
}
$var = new sonClass();
$var->run();
