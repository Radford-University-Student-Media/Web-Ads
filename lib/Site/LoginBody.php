<?php

require_once 'Page.php';

class LoginBody extends Body{

	private $context;

	public function __construct(&$context){
		$this->context = $context;
	}
	
	public function getTitle(){
	
		return "Login";
	
	}

	public function getScriptsHTML(){
		return "";
	}

	public function generateHTML(){
	
		return $this->context->getErrorHTML();
	
	}

}

?>