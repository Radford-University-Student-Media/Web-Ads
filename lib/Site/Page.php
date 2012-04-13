<?php

require_once './lib/Util/SessionUtil.php';

require_once 'Layout.php';
require_once 'UnauthErrorLayout.php';

class Page {

	private $minimumUserLevel;
	private $layout;
	private $userLevelErrorLayout;
	
	public function __construct($minUserLevel, $_layout){
	
		$this->minimumUserLevel = $minUserLevel;
		$this->layout = $_layout;
		$this->userLevelErrorLayout = new UnauthErrorLayout();
	
	}
	
	public function generateHTML(){
		if(SessionUtil::getUserlevel() >= $this->getMinimumUserLevel())
			return $this->layout->generateHTML();
		else{
			return $this->userLevelErrorLayout->generateHTML();
		}
	
	}
	
	public function getMinimumUserLevel(){
	
		return $this->minimumUserLevel;
	
	}
	
	public function setMinimumUserLevel($userLevel){
	
		$this->minimumUserLevel = $userLevel;
	
	}
	
	public function getLayout(){
	
		return $this->layout;
	
	}
	
	public function setLayout($_layout){
	
		$this->layout = $_layout;
	
	}
	
	public function getUserLevelErrorLayout(){
	
		return $this->getUserLevelErrorLayout;
	
	}
	
	public function setUserLevelErrorLayout($_layout){
	
		$this->getUserLevelErrorLayout = $_layout;
	
	}

	public function displayPage(){
	
		echo $this->generateHTML();
	
	}
}

?>