<?php

require_once './lib/DB/Database.php';
require_once './lib/DB/Size.php';

class SizeDao {

	public static function getAllSizes(){
		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix('websizes'));
		$sizes = array();
		while($row = mysql_fetch_assoc($result)){
			$sizes[] = new Size($row['Size']);
		}
		return $sizes;
	}

}

?>