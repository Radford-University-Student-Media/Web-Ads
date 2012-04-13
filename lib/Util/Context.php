<?php

class Context{

	private $pageID;
	private $errors = array();
	
	public function getPageID(){
	
		return $this->pageID;
	
	}
	
	public function setPageID($pageid){
	
		$this->pageID = $pageid;
	
	}
	
	public function addError($error){
	
		$this->errors[] = $error;
	
	}
	
	public function getErrors(){
	
		return $this->errors;
	
	}
	
	public function getErrorHTML(){
		
		if(count($this->errors) == 0){
			return "";
		}
		
		$errorhtml = "<div class=\"centered error\">";
		
		foreach($this->errors as $error){
		
			$errorhtml = $errorhtml." ".$error."<br />";
		
		}
		$errorhtml = $errorhtml."</div>";
		
		return $errorhtml;
		
	}

}

?>