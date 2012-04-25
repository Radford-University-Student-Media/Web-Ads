<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

require_once './config.php';

require_once './lib/DB/Database.php';

require_once './lib/Site/Page.php';
require_once './lib/Site/StandardLayout.php';
require_once './lib/Site/StandardNavigation.php';

require_once './lib/Util/Context.php';
require_once './lib/Util/SessionUtil.php';

class StatsBody extends Body{

	public function getTitle(){

		return "Stats";

	}

	public function getScriptsHTML(){
		return "";
	}

	public function generateHTML(){

		$result = Database::doQuery("SELECT site, size, count(ip) AS view_count FROM ".Database::addPrefix("webadviews")." GROUP BY site, size");

		$return = "<div class=\"centered\" style=\"width: 65%\">
		<table border=\"1\" style=\"margin-left: auto; margin-right: auto; width: 300px;\">
		<caption>All Time Unique Visitors Per Site</caption>
		<tr>
			<th>Site</th>
			<th>Size</th>
			<th>Visitors</th>
		</tr>";

		while($row = mysql_fetch_assoc($result)){

			$return.="
	<tr>
		<td>".$row['site']."</td>
		<td>".$row['size']."</td>
		<td>".$row['view_count']."</td>
	</tr>";

		}

		$return.="</table></div>";

		return $return;
	}
}
?>