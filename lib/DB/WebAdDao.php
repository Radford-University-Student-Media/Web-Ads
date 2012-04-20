<?php

require_once './lib/DB/Database.php';
require_once './lib/DB/SiteInsertionDao.php';
require_once './lib/DB/WebAd.php';

require_once './lib/Util/DateUtil.php';

class WebAdDao {
	private static function makeAd($row) {
		return new WebAd($row['webadID'], $row['name'], $row['StartingMonday'], $row['Size'], $row['Image'], $row['Impressions'], $row['Clicks'], $row['redirectUrl'], $row['StartDate'], $row['EndDate']);
	}

	public static function createWebAd($name, $monday, $size, $image, $url, $start, $end){

		$query = "INSERT INTO ".Database::addPrefix('webads')." SET name = '".$name."',
			StartingMonday = '".$monday."', Size = '".$size."' , Image = '".$image."',
			redirectUrl = '".Database::makeStringSafe($url)."', StartDate = '".$start."',
			EndDate = '".$end."'";

		Database::doQuery($query);

		$row = mysql_fetch_assoc(Database::doQuery("SELECT * FROM ".Database::addPrefix('webads')." ORDER BY webadID DESC LIMIT 1"));

		return WebAdDao::makeAd($row);
	}

	public static function getWebAdByID($id){

		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix('webads')." WHERE webadID = '".Database::makeStringSafe($id)."' LIMIT 1");

		$row = mysql_fetch_assoc($result);

		if(mysql_num_rows($result) > 0)
		return WebAdDao::makeAd($row);
		else
		return null;

	}

	public static function incrementImpression(WebAd $webad){
		$query = "UPDATE ".Database::addPrefix('webads')." SET Impressions = Impressions + 1 WHERE webadID = '".$webad->getID()."'";
		Database::doQuery($query);
	}


	public static function incrementClicks(WebAd $webad){
		$query = "UPDATE ".Database::addPrefix('webads')." SET Clicks = Clicks + 1 WHERE webadID = '".$webad->getID()."'";
		Database::doQuery($query);
	}

	public static function getNextAdBySizeAndDate($size, $date, $incrementImpression){

		$query = "SELECT * FROM ".Database::addPrefix('webads')." WHERE Size = '".$size."' AND StartingMonday = '".DateUtil::findPreviousMonday($date)."' ORDER BY Impressions ASC LIMIT 1";
		$result = Database::doQuery($query);

		$row = mysql_fetch_assoc($result);
		$webad = WebAdDao::makeAd($row);

		if($incrementImpression)
		WebAdDao::incrementImpression($webad);

		return $webad;

	}

	public static function getRandomAdBySizeAndDate($size, $date, $incrementImpression){

		$query = "SELECT * FROM ".Database::addPrefix('webads')." WHERE Size = '".$size."' AND StartingMonday = '".DateUtil::findPreviousMonday($date)."'";
		$result = Database::doQuery($query);
		$webads = array();

		while($row = mysql_fetch_assoc($result)){
			$webads[] = WebAdDao::makeAd($row);
		}

		if(mysql_num_rows($result) > 0){

			$webad = $webads[array_rand($webads)];

			if($incrementImpression)
			WebAdDao::incrementImpression($webad);

			return $webad;

		}else{
			return WebAd::getDefaultAd($size, $date);
		}

	}

	//SELECT * FROM webads WHERE webadID in (select WebAdID from siteinsertions where site = 'rfr')

	public static function getRandomAdBySizeForDateRangeAndSite($size, $site, $date, $incrementImpression){

		$size = Database::makeStringSafe($size);
		$site = Database::makeStringSafe($site);
		$date = Database::makeStringSafe($date);
		
		$query = "SELECT * FROM ".Database::addPrefix('webads')." WHERE Size = '".$size."' AND StartDate <= '".$date."' AND EndDate >= '".$date."' AND webadID in (select WebAdID from ".Database::addPrefix('siteinsertions')." where Site = '".$site."')";
		$result = Database::doQuery($query);
		$webads = array();

		while($row = mysql_fetch_assoc($result)){
			$webads[] = WebAdDao::makeAd($row);
		}

		if(mysql_num_rows($result) > 0){

			$webad = $webads[array_rand($webads)];

			if($incrementImpression)
			WebAdDao::incrementImpression($webad);

			return $webad;

		}else{
			return WebAd::getDefaultAd($size, $date);
		}

	}

	public static function getRandomAdBySizeForDateRange($size, $date, $incrementImpression){

		$query = "SELECT * FROM ".Database::addPrefix('webads')." WHERE Size = '".$size."' AND StartDate <= '".$date."' AND EndDate >= '".$date."'";
		$result = Database::doQuery($query);
		$webads = array();

		while($row = mysql_fetch_assoc($result)){
			$webads[] = WebAdDao::makeAd($row);
		}

		if(mysql_num_rows($result) > 0){

			$webad = $webads[array_rand($webads)];

			if($incrementImpression)
			WebAdDao::incrementImpression($webad);

			return $webad;

		}else{
			return WebAd::getDefaultAd($size, $date);
		}

	}

	public static function getAdsByDay($date){
		$query = "SELECT * FROM ".Database::addPrefix('webads')." WHERE StartingMonday = '".DateUtil::findPreviousMonday($date)."'";
		$result = Database::doQuery($query);
		$webads = array();

		while($row = mysql_fetch_assoc($result)){
			$webads[] = WebAdDao::makeAd($row);
		}

		return $webads;
	}

	public static function deleteAdById($webAdId){
		SiteInsertionDao::deleteByWebAdID($webAdId);
		Database::doQuery("DELETE FROM ".Database::addPrefix('webads')." WHERE webadID = '".Database::makeStringSafe($webAdId)."' LIMIT 1");
	}

	public static function getDistinctMondays(){

		$mondays = array();

		$result = Database::doQuery("SELECT DISTINCT StartingMonday FROM ".Database::addPrefix('webads')." ORDER BY StartingMonday DESC");

		while($row = mysql_fetch_assoc($result)){
			$mondays[] = $row['StartingMonday'];
		}

		return $mondays;

	}

}

?>