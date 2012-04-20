<?php

class SiteInsertion {
	
	public $site;
	public $size;
	public $webadID;
	
	public function __construct($site, $size, $webadID){
		$this->site = $site;
		$this->size = $size;
		$this->webadID = $webadID;
	}
}

?>