<?php


require_once './config.php';

require_once './lib/DB/Database.php';
require_once './lib/DB/WebAd.php';
require_once './lib/DB/WebAdDao.php';

require_once './lib/Util/DateUtil.php';
require_once './lib/Util/SimpleImage.php';
require_once './lib/Util/SessionUtil.php';

Database::Open();

SessionUtil::start();

if(isset($_GET['size'])){

	$webad = WebAdDao::getWebAdByID(SessionUtil::getLastViewed($_GET['size']));
	
	if($webad){
		WebAdDao::incrementClicks($webad);
		header("Location: ".$webad->getRedirectUrl());
	}else{
		header("Location: ".WebAd::getDefaultAd($_GET['size'])->getRedirectUrl());
	}

}

Database::Close();

?>