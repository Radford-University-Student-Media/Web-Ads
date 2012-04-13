<?php

class NaviButton{
	
	private static $DEFAULT_COLOR = "gray";
	private static $SELECTED_COLOR = "orange";
	private $title;
	private $href;
	private $selected = false;
	
	public function __construct($title, $href, $selected){
	
		$this->title = $title;
		$this->href = $href;
		$this->selected = $selected;
	
	}
	
	public function generateHTML(){
	
		if(!$this->selected)
			return "<a href=\"".$this->href."\" class=\"button bigrounded ".NaviButton::$DEFAULT_COLOR."\">".$this->title."</a>";
		else
			return "<a href=\"".$this->href."\" class=\"button bigrounded ".NaviButton::$SELECTED_COLOR."\">".$this->title."</a>";
	
	}
	
}

?>