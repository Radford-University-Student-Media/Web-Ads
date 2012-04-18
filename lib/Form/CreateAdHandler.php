<?php

require_once './lib/DB/WebAdDao.php';
require_once './lib/DB/WebAdUserDao.php';
require_once './lib/Util/LDAPUtil.php';
require_once './lib/Util/Context.php';

class CreateAdHandler{

	public function handleForm($context, $action){

		if($action == "createAd"){
				
			if((isset($_POST['start']) && $_POST['start'] != "")  &&
			(isset($_POST['size']) && $_POST['size'] != "")  &&
			(isset($_POST['name']) && $_POST['name'] != "")  &&
			(isset($_POST['url']) && $_POST['url'] != "")){

				$start = $_POST['start'];
				$end = $_POST['end'];

				$dayOfWeek = date("D",strtotime($start));
					
				$splitStart = explode("/", $start);
				$mysqlStart = $splitStart[2]."-".$splitStart[0]."-".$splitStart[1];
				$splitEnd = explode("/", $end);
				$mysqlEnd = $splitEnd[2]."-".$splitEnd[0]."-".$splitEnd[1];
					
				if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){

					$filename = $this->saveSampleImage($context, $_FILES['image'], SessionUtil::getUsername());

					if($filename != ""){
							
						WebAdDao::createWebAd($_POST['name'], DateUtil::findPreviousMonday($mysqlStart), $_POST['size'], $filename, $_POST['url'], $mysqlStart, $mysqlEnd);
							
					}else{
						$context->addError("Error Uploading File, Please Try Again.");
					}

				}else{
					$context->addError("No File Uploaded.");
				}

			}else{
				$context->addError("Required Field Left Blank.");
			}
				
		}else{
				
			$context->addError("Incorrect Action.");
				
		}

	}

	public function saveSampleImage(Context $context, $file, $username){

		$type = $file['type'];
		$size = $file['size'];

		if($type == "image/gif" || $type == "image/jpeg" || $type == "image/jpeg"
		|| $type == "image/pjpeg" || $type == "image/png"){

			if($size < 20000000){
					
				$filename = explode('.', $file['name']);
				$newFilename = "./ad_images/ar".$username."t" . time() . "." .$filename[count($filename) - 1];

				$success = move_uploaded_file($file['tmp_name'], $newFilename);

				if(!$success){
					$context->addError("Error Uploading File.");
					return "";
				}else{
					return $newFilename;
				}

					
			}else{
				$context->addError("File Size Too Large.");
				return "";
			}

		}else{
			$context->addError("Unrecognized File Type.");
			return "";
		}

	}

}

?>