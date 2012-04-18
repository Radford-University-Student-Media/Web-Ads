<?php

class WebAdView{
	public $ip;
	public $hostname;
	public $site;
	public $size;
	public $webadID;
	
	public function __construct($ip, $hostname, $site, $size, $webadID){
		$this->ip = $ip;
		$this->hostname = $hostname;
		$this->site = $site;
		$this->size = $size;
		$this->webadID = $webadID;
	}
}

?>