<?php

require_once "./config.php";

class Database{

	private static $curQueryNum = 0;
	private static $link = null;
	
	public static function Open(){
		
		Database::$link = mysql_connect(Config::getVariable("mysql_server"), Config::getVariable("mysql_user"), Config::getVariable("mysql_password"));
		if (!Database::$link){
			die("Q".Database::$curQueryNum.": Could not connect: " . mysql_error(Database::$link));
		}
		
		$db_selected = mysql_select_db(Config::getVariable("mysql_database"), Database::$link);
		if(!$db_selected){
			die("Q".Database::$curQueryNum . ": Couldn\"t use ".Config::getVariable("mysql_database").": " . mysql_error(Database::$link));
		}
	
	}
	
	public static function Close(){
		$error = mysql_error(Database::$link);
		
		if($error){
		
			die("Q".Database::$curQueryNum.": Invalid Query: " . mysql_error(Database::$link));
		
		}
		
		mysql_close(Database::$link);
		
		Database::$link = null;
	}

	public static function CurrentMySQLDate(){

		return date("Y-m-d");

	}

	public static function CurrentMySQLDateTime(){

		return date("Y-m-d H:i:s");

	}

	/*
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	!!! This !MUST! be used on all variables going into a MySQL Query!        !!!!
	!!!																		  !!!!
	!!! This will safely exit any dangerous characters in the provded string. !!!!
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	*/

	
	/**
	 * Safely escapes string
	 * @param String $string
	 */
	public static function makeStringSafe($string){

		return addslashes($string);

	}

	/*

		This is the old safe string I used before performance testing. I left it in
		simply because it would be good to use if you want to be absolutely sure
		your string is safe.

	*/
	/**
	 * Safely escapes string (makes mysql connection)
	 * @param unknown_type $string
	 */
	public static function makeMySQLSafe($string){
		
		if(Database::$link == null){
		
			Database::Open();
		
		}
		
		$string = mysql_real_escape_string($string, Database::$link);
		
		return $string;

	}
	
	public static function addPrefix($tableName){
	
		return Config::getVariable("mysql_table_prefix") . $tableName;
	
	}

	/*

		All queries should be done through this function.
		On query errors it will popup an error message with the query number
		and a short description of the error.

	*/

	public static function doQuery($v_query){ 
		
		if(Database::$link == null){
		
			Database::Open();
		
		}
		
		Database::$curQueryNum = Database::$curQueryNum + 1;
		
		$result = mysql_query($v_query, Database::$link);
		if (!$result) {
			die("Q".Database::$curQueryNum.": Invalid Query: " . mysql_error(Database::$link) . "\n\nQuery:\n".$v_query);
		}
		
		return $result;

	}

}

?>