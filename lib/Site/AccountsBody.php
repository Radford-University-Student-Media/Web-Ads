<?php

require_once 'Page.php';
require_once './lib/DB/WebAdUserDao.php';

class AccountsBody extends Body{

	public function getTitle(){
	
		return "Accounts";
	
	}
	
	public function getScriptsHTML(){
		return "";
	}
	
	public function getUserSelect(){
		$users = WebAdUserDao::getAllWebAdUsers();
		$select = "<select name=\"username\" class=\"bluefocus\" style=\"width: 170px;\" size=5>";
		foreach($users as $user){
			$select = $select . $user->generateOptionHTML();
		}
		$select = $select . "</select>";
		return $select;
		
	}

	public function generateHTML(){
	
		return "	
		<table style=\"margin-left: auto; margin-right: auto;\">
			<form action=\"index.php?pageid=accounts\" method=\"POST\">
			<input type=\"hidden\" name=\"action\" value=\"addAccount\">
			<tr>
				<td valign=\"top\" colspan=2><label for=\"username\" class=\"above\">Username</label>
				<input type=\"text\" name=\"username\" placeholder=\"Username\" class=\"stdinput bluefocus\">
				<input type=\"submit\" value=\"Add\" class=\"stdbutton  bluefocus\"></td>
			</tr>
			</form>
			<form action=\"index.php?pageid=accounts\" method=\"POST\">
			<input type=\"hidden\" name=\"action\" value=\"deleteAccount\">
			<tr>
				<td valign=\"top\">".$this->getUserSelect()."</td>
				<td valign=\"bottom\"><input type=\"submit\" value=\"Delete\" class=\"altbutton  bluefocus\"></td>
			</tr>
			</form>
		</table>";
	
	}

}

?>