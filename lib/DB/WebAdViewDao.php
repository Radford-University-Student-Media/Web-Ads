<?php

require_once './lib/DB/Database.php';
require_once './lib/DB/WebAdView.php';

class WebAdViewDao {

	private static function makeView($row){
		return new WebAdView($row['ip'], $row['hostname'], $row['site'], $row['size'], $row['webadID']);
	}
	
	public static function createView($ip, $hostname, $site, $size, $webadID){
		
		$ip = Database::makeStringSafe($ip);
		$hostname = Database::makeStringSafe($hostname);
		$site = Database::makeStringSafe($site);
		$size = Database::makeStringSafe($size);
		$webadID = Database::makeStringSafe($webadID);
		
		$query = "INSERT INTO ".Database::addPrefix('webadviews')." SET".
		" ip = '".$ip."', hostname = '".$hostname."', site = '".$site."'".
		", webadID = '".$webadID."'";
	}
	
	public static function getView($ip, $site, $size){

		$ip = Database::makeStringSafe($ip);
		$site = Database::makeStringSafe($site);
		$size = Database::makeStringSafe($size);
		
		$query = "SELECT FROM ".Database::addPrefix('webadviews')." WHERE".
				" ip = '".$ip."' AND site = '".$site."' AND size = '".$size."'";
		
		$result = Database::doQuery($query);
		
		if(mysql_num_rows($result) > 0){
			return WebAdViewDao::makeView(mysql_fetch_assoc($result));
		}else{
			return null;
		}
		
	}
	
	public static function setView($ip, $hostname, $site, $size, $webadID){
		$ip = Database::makeStringSafe($ip);
		$hostname = Database::makeStringSafe($hostname);
		$site = Database::makeStringSafe($site);
		$size = Database::makeStringSafe($size);
		$webadID = Database::makeStringSafe($webadID);
		
		$view = WebAdViewDao::getView($ip, $site, $size);
		
		if($view){
			$query = "UPDATE".Database::addPrefix('webadviews')." SET webadID = '".$webadID."'WHERE".
					" ip = '".$ip."' AND site = '".$site."' AND size = '".$size."'";
			Database::doQuery($query);
		}else{
			WebAdViewDao::createView($ip, $hostname, $site, $size, $webadID);
		}
	}

}

?>