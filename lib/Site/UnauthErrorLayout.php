<?php

require_once 'Layout.php';

class UnauthErrorLayout extends Layout{

	public function __construct(){
	
		parent::__construct("Unauthorized Access", null, null);
	
	}

	public function generateHTML(){
	
		return "<html><body>Unauthorized Access</body></html>";
	
	}

}

?>