<?php

require_once "Navigation.php";
require_once "NaviButton.php";

class StandardNavigation extends Navigation{

	private $context;

	public function __construct($context){
	
		$this->context = $context;
	
	}

	public function generateHTML(){
	
		if(SessionUtil::isLoggedIn()){
	
			$homeSelected = false;
			$createAdSelected = false;
			$viewAdsSelected = false;
			$accountsSelected = false;
			
			if($this->context->getPageID() == "home"){
				$homeSelected = true;
			}
			else if($this->context->getPageID() == "createAd"){
				$createAdSelected = true;
			}
			else if($this->context->getPageID() == "viewAds"){
				$viewAdsSelected = true;
			}
			else if($this->context->getPageID() == "accounts"){
				$accountsSelected = true;
			}
		
			$homeButton = new NaviButton("Home", "./index.php?pageid=home", $homeSelected);
			$createAdButton = new NaviButton("Create Ad", "./index.php?pageid=createAd", $createAdSelected);
			$viewAdsButton = new NaviButton("View Ads", "./index.php?pageid=viewAds", $viewAdsSelected);
			$accountsButton = new NaviButton("Accounts", "./index.php?pageid=accounts", $accountsSelected);
			$logoutButton = new NaviButton("Logout", "./index.php?pageid=logout", false);
		
			return $homeButton->generateHTML()." ".
				$createAdButton->generateHTML()." ".
				$viewAdsButton->generateHTML()." ".
				$accountsButton->generateHTML()." ".
				$logoutButton->generateHTML();
			
		}else{
		
			if($this->context->getPageID() == "login"){
		
				return "<div class=\"centered\">
					<form action=\"index.php?pageid=login\" method=\"POST\">
						<input type=\"hidden\" name=\"action\" value=\"login\" />
						<input name=\"username\" type=\"text\" placeholder=\"Username\" class=\"text bluefocus\" />
						<input name=\"password\" type=\"password\" placeholder=\"Password\" class=\"text bluefocus\" />
						<input type=\"submit\" value=\"Login\" class=\"stdbutton bluefocus\" />
					</form>
				</div>";
				
			}else{
				return "";
			};
		
		}
	
	}

}

?>