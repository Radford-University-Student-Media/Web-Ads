<?php

class Config{

	private static $config = array(

		'maint_mode' => false,

		'location' => 'https://php.radford.edu/~smads/webads/',

		'mysql_server' => 'localhost',

		'mysql_user' => 'smads',

		'mysql_password' => 'Baconstrips2',

		'mysql_database' => 'smads',

		'mysql_table_prefix' => '',
		
		'blowfish_key' => 'abababababababab',
		
		'ldap_domain' => 'radford.edu',

		'ldap_server' => 'interstate81.radford.edu'

		);
		
	private static function getConfig(){
	
		return Config::$config;
	
	}
	
	public static function getVariable($vName){

		$configVals = Config::getConfig();
	
		return $configVals[$vName];

	}

}

?>
