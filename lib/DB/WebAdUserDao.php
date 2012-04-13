<?php

require_once './lib/DB/WebAdUser.php';

class WebAdUserDao {
	
	public static function createUser($username){
	
	Database::doQuery("INSERT INTO ".Database::addPrefix('webadusers')." SET username = '".Database::makeStringSafe($username)."'");
			
	}
	public static function deleteUser($username){
		
		Database::doQuery("DELETE FROM ".Database::addPrefix('webadusers')." WHERE username = '".Database::makeStringSafe($username)."' LIMIT 1");
		
	}

	public static function getWebAdUserByUsername($username){
		
		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix('webadusers')." WHERE username = '".Database::makeStringSafe($username)."' LIMIT 1");
		
		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_assoc($result);
			return new WebAdUser($row['username']);
		}else{
			return null;
		}
		
	}
	
	public static function getAllWebAdUsers(){
		
		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix('webadusers')." ORDER BY username ASC");
		$users = array();
		while($row = mysql_fetch_assoc($result)){
			$users[] = new WebAdUser($row['username']);
		}
		return $users;
		
	}

}

?>