<?php

require_once 'Page.php';

class HomeBody extends Body{

	public function getTitle(){
	
		return "Home";
	
	}
	
	public function getScriptsHTML(){
		return "";
	}

	public function generateHTML(){
	
		return "<div class=\"centered\" style=\"width: 65%\">
			<div style=\"float: left;\">
				<label for=\"box\" class=\"above\">Box Ad Image</label>
				<textarea name=\"box\" readonly cols=\"35\" rows=\"2\" class=\"text bluefocus\">https://php.radford.edu/~smads/webads/getAd.php?size=300x250</textarea>
				<label for=\"box\" class=\"above\">Box Ad Link</label>
				<textarea name=\"box\" readonly cols=\"35\" rows=\"2\" class=\"text bluefocus\">https://php.radford.edu/~smads/webads/click.php?size=300x250</textarea>
				<label for=\"banner\" class=\"above\">Banner Ad Image</label>
				<textarea name=\"banner\" readonly cols=\"35\" rows=\"2\" class=\"text bluefocus\">https://php.radford.edu/~smads/webads/getAd.php?size=468x60</textarea>
				<label for=\"banner\" class=\"above\">Banner Ad Link</label>
				<textarea name=\"banner\" readonly cols=\"35\" rows=\"2\" class=\"text bluefocus\">https://php.radford.edu/~smads/webads/click.php?size=468x60</textarea>
			</div>
			<div style=\"float: right;\">
				<label for=\"box\" class=\"above\">Box Ad HTML</label>
				<textarea name=\"box\" readonly cols=\"35\" rows=\"7\" class=\"text bluefocus\"><a href=\"https://php.radford.edu/~smads/webads/click.php?size=300x250\" target=\"_blank\"><img src=\"https://php.radford.edu/~smads/webads/getAd.php?size=300x250\" style=\"border-width: 0px;\" \></a></textarea>
				<br /><br /><label for=\"box\" class=\"above\">Banner Ad HTML</label>
				<textarea name=\"box\" readonly cols=\"35\" rows=\"7\" class=\"text bluefocus\"><a href=\"https://php.radford.edu/~smads/webads/click.php?size=468x60\" target=\"_blank\"><img src=\"https://php.radford.edu/~smads/webads/getAd.php?size=468x60\" style=\"border-width: 0px;\" \></a></textarea>
			</div>
		</div>";
	
	}

}

?>