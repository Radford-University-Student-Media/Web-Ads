<?php

require_once './lib/DB/SizeDao.php';

class Size {

	private $size;
	
	public function __construct($size){
		$this->size = $size;
	}
	
	public function getSize(){
		return $this->size;
	}

	public function setSize($size){
		$this->size = $size;
	}
	
	public function generateOptionHTML(){
		return "<option value=\"".$this->size."\">".$this->size."</option>";
	}
	
	public static function getSelectHTHL($name, $tabindex){
		
		$sizes = SizeDao::getAllSizes();
		
		$html = "<select name=\"".$name."\" class=\"bluefocus normalsize\" tabindex=\"".$tabindex."\">";
		
		foreach($sizes as $size){
			$html = $html . $size->generateOptionHTML();
		}
		
		$html = $html . "</select>";
		
		return $html;
		
	}
}

?>