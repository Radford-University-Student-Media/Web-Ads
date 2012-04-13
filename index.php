<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

require_once './config.php';

require_once './lib/DB/Database.php';

require_once './lib/Site/Page.php';
require_once './lib/Site/StandardLayout.php';
require_once './lib/Site/StandardNavigation.php';

require_once './lib/Util/Context.php';
require_once './lib/Util/SessionUtil.php';

if(!SessionUtil::start())
	echo "Error Starting Session";

Database::Open();

$context = new Context();
$context->setPageID("home");

$setPageVar = false;

if(isset($_GET['pageid'])){
	$context->setPageID($_GET['pageid']);
}
else if(isset($_POST['pageid'])){
	$context->setPageID($_POST['pageid']);
}

if(isset($_POST['action'])){

	$action = $_POST['action'];
	
	if($action == "setPageVar"){
		$setPageVar = true;
	}else{
	
		if($context->getPageID() == "login"){
		
			require_once './lib/Form/LoginHandler.php';
			$loginHandler = new LoginHandler();
			$loginHandler->handleForm($context, $action);
		
		}else if($context->getPageID() == "createAd"){
		
			require_once './lib/Form/CreateAdHandler.php';
			$createAdHandler = new CreateAdHandler();
			$createAdHandler->handleForm($context, $action);
		
		}else if($context->getPageID() == "viewAds"){
		
			require_once './lib/Form/DeleteAdHandler.php';
			$deleteAdHandler = new DeleteAdHandler();
			$deleteAdHandler->handleForm($context, $action);
		
		}else if($context->getPageID() == "accounts"){
		
			require_once './lib/Form/AccountsHandler.php';
			$accountsHandler = new AccountsHandler();
			$accountsHandler->handleForm($context, $action);
		
		}
	
	}

}

if(!SessionUtil::isLoggedIn()){
	$context->setPageID("login");
}

$pageBody;

if($context->getPageID() == "home"){
	require_once './lib/Site/HomeBody.php';
	$pageBody = new HomeBody();
}
else if($context->getPageID() == "login"){
	require_once './lib/Site/LoginBody.php';
	$pageBody = new LoginBody($context);
}
else if($context->getPageID() == "logout"){
	SessionUtil::restart();
	$context->setPageID("login");
	require_once './lib/Site/LoginBody.php';
	$pageBody = new LoginBody($context);
}
else if($context->getPageID() == "createAd"){
	require_once './lib/Site/CreateAdBody.php';
	$pageBody = new CreateAdBody($context);
}
else if($context->getPageID() == "viewAds"){
	require_once './lib/Site/ViewAdsBody.php';
	if(!$setPageVar)
		$pageBody = new ViewAdsBody($context, Database::CurrentMySQLDate());
	else
		$pageBody = new ViewAdsBody($context, $_POST['monday']);
}
else if($context->getPageID() == "accounts"){
	require_once './lib/Site/AccountsBody.php';
	if(!$setPageVar)
		$pageBody = new AccountsBody();
	else
		$pageBody = new ViewAdsBody();
}
else{
	//$context->setPageID("home");
	require_once './lib/Site/HomeBody.php';
	$pageBody = new HomeBody();
}

$pageNavigation = new StandardNavigation($context);
$layout = new StandardLayout($pageNavigation, $pageBody);

$page = new Page(0, $layout);

$page->displayPage();

Database::Close();

?>