<?php

require_once './lib/Site/Page.php';

require_once './lib/DB/WebAdDao.php';

require_once './lib/Util/DateUtil.php';

class ViewAdsBody extends Body{

	private $context;
	private $startingMonday;

	public function __construct($context, $monday){
		$this->context = $context;
		$this->startingMonday = $monday;
	}

	public function getTitle(){

		return "View Ads";

	}

	public function getScriptsHTML(){
		return "<script type=\"text/javascript\">
			$(document).ready(function(){
				$('.date').datepicker();
			})
		</script>";
	}
	
	public function generateMondaySelectForm(){
		$select = "<form action=\"./index.php?pageid=viewAds\" method=\"POST\">
			<input type=\"hidden\" name=\"action\" value=\"setPageVar\">
			<select name=\"monday\" class=\"bluefocus\">";
		$mondays = WebAdDao::getDistinctMondays();
		foreach($mondays as $monday){
			if(DateUtil::findPreviousMonday($this->startingMonday) == $monday)
				$select = $select . "<option value=\"".$monday."\" selected=\"selected\">".$monday."</option>";
			else
				$select = $select . "<option value=\"".$monday."\">".$monday."</option>";
			
		}
		$select = $select . "</select> <input type=\"submit\" value=\"Go\" class=\"stdbutton bluefocus\" \></form>";
		return $select;
	}

	public function generateHTML(){

		$ads = WebAdDao::getAdsByDay($this->startingMonday);
		$adsHtml = "";
		foreach($ads as $ad){
			$adsHtml = $adsHtml . $ad->generateTRHTML();
		}
		

		return "<br />".$this->context->getErrorHTML()."<div class=\"centered\" style=\"width: 65%\">
		".$this->generateMondaySelectForm()."
		<table style=\"margin-left: auto; margin-right: auto;\" border=\"0\">
		
			<tr><th>Name</th><th>Starting Monday</th><th>Size</th><th>Impressions</th><th>Clicks</th><th>-</th></tr>
			".$adsHtml."
		
		</table>
		
		</div>"; 

	}

}

?>