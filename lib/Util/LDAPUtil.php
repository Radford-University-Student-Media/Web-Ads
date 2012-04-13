<?php

class LDAPUtil{

	private static function checkNTuser($username, $password, $DomainName, $ldap_server){
		if ($password == '')
			return false;
		$auth_user=$username."@".$DomainName;
		if($connect=@ldap_connect($ldap_server)){
			if($bind=@ldap_bind($connect, $auth_user, $password)){
				@ldap_close($connect);

				return true;
			}
		}

		@ldap_close($connect);
		return false;
	}

	public static function authLDAPUser($username, $password){

		return LDAPUtil::checkNTuser($username, $password, Config::getVariable('ldap_domain'), Config::getVariable('ldap_server'));

	}

}

?>