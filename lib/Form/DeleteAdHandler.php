<?php

require_once './lib/DB/WebAdDao.php';
require_once './lib/Util/LDAPUtil.php';
require_once './lib/Util/Context.php';

class DeleteAdHandler{

	public function handleForm($context, $action){
	
		if($action == "deleteAd"){
			
			if(isset($_POST['adId'])){
				
				WebAdDao::deleteAdById($_POST['adId']);
				
			}else{
				$context->addError("Required Field Left Blank.");
			}
			
		}else{
			
			$context->addError("Incorrect Action.");
			
		}
	
	}

}

?>