<?php

require_once './lib/DB/WebAdUserDao.php';
require_once './lib/Util/LDAPUtil.php';
require_once './lib/Util/Context.php';

class LoginHandler{

	public function handleForm($context, $action){
	
		if($action == "login"){
		
			$ldapAuthed = LDAPUtil::authLDAPUser($_POST['username'], $_POST['password']);
			
			if($ldapAuthed){
			
				$user = WebAdUserDao::getWebAdUserByUsername($_POST['username']);
				
				if($user != null && $user instanceof WebAdUser){
					
					SessionUtil::setUsername($user->getUsername());
					$context->setPageID("home");
					
				}else{
					
					$context->addError("Incorrect Login");
					
				}
			
			}else{
			
				$context->addError("Incorrect Login");
			
			}
		
		}else{
			
			$context->addError("Incorrect Action.");
			
		}
	
	}

}

?>