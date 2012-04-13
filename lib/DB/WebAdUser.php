<?php

class WebAdUser {

	private $username;
	
	public function __construct($username){
		
		$this->username = $username;
		
	}
	
	public function setUsername($username){
		$this->username = $username;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function generateOptionHTML(){
		
		return "<option value=\"".$this->username."\">".$this->username."</option>";
		
	}

}

?>