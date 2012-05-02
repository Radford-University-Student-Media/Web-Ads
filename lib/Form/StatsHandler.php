<?php

require_once './lib/DB/WebAdViewDao.php';
require_once './lib/Util/LDAPUtil.php';
require_once './lib/Util/Context.php';

class StatsHandler{

	public function handleForm($context, $action){
	
		if($action == "clear"){
			
			WebAdViewDao::clearViews();
			
		}else{
			
			$context->addError("Incorrect Action.");
			
		}
	
	}

}

?>