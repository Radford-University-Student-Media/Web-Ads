<?php

class DateUtil {

	const MYSQLDATE_FORMAT = "Y-m-d";
	const DAY_IN_SECONDS = 86400;

	public static function phpToMysqlDate($php){
		$split = explode("/", $php);
		$mysql = $split[2]."-".$split[0]."-".$split[1];
		return $mysql;
	}

	public static function mysqlToPhpDate($mysql){
		$split = explode("-", $mysql);
		$php = $split[1]."/".$split[2]."/".$split[0];
		return $php;
	}

	public static function findPreviousMonday($mysqlDate){
		$time = strtotime(DateUtil::mysqlToPhpDate($mysqlDate));
		$day = date("D", $time);

		if($day == "Mon"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time);
		}else if($day == "Tue"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time-(DateUtil::DAY_IN_SECONDS));
		}else if($day == "Wed"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time-(2*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Thu"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time-(3*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Fri"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time-(4*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Sat"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time-(5*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Sun"){
			return date(DateUtil::MYSQLDATE_FORMAT, $time-(6*DateUtil::DAY_IN_SECONDS));
		}
	}

	public static function getPreviousMonday(){
		$day = date("D");

		if($day == "Mon"){
			return date(DateUtil::MYSQLDATE_FORMAT);
		}else if($day == "Tue"){
			return date(DateUtil::MYSQLDATE_FORMAT, time()-(DateUtil::DAY_IN_SECONDS));
		}else if($day == "Wed"){
			return date(DateUtil::MYSQLDATE_FORMAT, time()-(2*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Thu"){
			return date(DateUtil::MYSQLDATE_FORMAT, time()-(3*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Fri"){
			return date(DateUtil::MYSQLDATE_FORMAT, time()-(4*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Sat"){
			return date(DateUtil::MYSQLDATE_FORMAT, time()-(5*DateUtil::DAY_IN_SECONDS));
		}else if($day == "Sun"){
			return date(DateUtil::MYSQLDATE_FORMAT, time()-(6*DateUtil::DAY_IN_SECONDS));
		}
	}

}

?>