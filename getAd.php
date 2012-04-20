<?php


require_once './config.php';

require_once './lib/DB/Database.php';
require_once './lib/DB/WebAd.php';
require_once './lib/DB/WebAdDao.php';
require_once './lib/DB/WebAdViewDao.php';

require_once './lib/Util/DateUtil.php';
require_once './lib/Util/SimpleImage.php';
require_once './lib/Util/SessionUtil.php';

Database::Open();

SessionUtil::start();

if(isset($_GET['size'])){

	if(!isset($_GET['site'])){
		$webad = WebAdDao::getRandomAdBySizeForDateRange($_GET['size'], Database::CurrentMySQLDate(), true);
		$_GET['site'] = '';
	}
	else{
		$webad = WebAdDao::getRandomAdBySizeForDateRangeAndSite($_GET['size'], $_GET['site'], Database::CurrentMySQLDate(), true);
	}


	if(!$webad){
		//SessionUtil::setLastViewed($_GET['size'], 0);
		WebAdViewDao::setView($_SERVER['REMOTE_ADDR'], gethostbyaddr($_SERVER['REMOTE_ADDR']), $_GET['site'], $_GET['size'], 0);
		$image = new SimpleImage();
		$image->load('./images/notfound.png');
		header('Content-Type: image/jpeg');
		echo $image->output();
		Database::Close();
		exit();
	}else{
		WebAdViewDao::setView($_SERVER['REMOTE_ADDR'], gethostbyaddr($_SERVER['REMOTE_ADDR']), $_GET['site'], $_GET['size'], $webad->getID());
		//SessionUtil::setLastViewed($_GET['size'], $webad->getID());
		$image_info = getimagesize($webad->getImage());
		$image_type = $image_info[2];
		if( $image_type == IMAGETYPE_JPEG ) {
			header('Content-Type: image/jpeg');
		} elseif( $image_type == IMAGETYPE_GIF ) {
			header('Content-Type: image/gif');
		} elseif( $image_type == IMAGETYPE_PNG ) {
			header('Content-Type: image/png');
		}
		echo file_get_contents($webad->getImage());
	}

}

Database::Close();

?>