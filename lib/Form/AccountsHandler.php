<?php

require_once './lib/DB/WebAdUserDao.php';
require_once './lib/Util/Context.php';

class AccountsHandler{

	public function handleForm($context, $action){
	
	if($action == "addAccount"){
			
			if((isset($_POST['username']) && $_POST['username'] != "")){
				
				$username = $_POST['username'];
				
				WebAdUserDao::createUser($username);
				
			}else{
				$context->addError("Required Field Left Blank.");
			}
			
		}else if($action == "deleteAccount"){
			
			if((isset($_POST['username']) && $_POST['username'] != "")){
				
				$username = $_POST['username'];
				
				WebAdUserDao::deleteUser($username);
				
			}else{
				$context->addError("Required Field Left Blank.");
			}
			
		}else{
			
			$context->addError("Incorrect Action.");
			
		}
	
	}

}

?>