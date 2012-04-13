<?php

require_once "Layout.php";

class StandardLayout extends Layout{

	public function generateHTML(){

	$page = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" >

	<head>
	
		<title>".$this->getBody()->getTitle()."</title>
		
		<link type=\"text/css\" href=\"./css/jquery.jscrollpane.css\" rel=\"stylesheet\" media=\"all\" />
		<link type=\"text/css\" href=\"./css/button.css\" rel=\"stylesheet\" media=\"all\" />
		<link type=\"text/css\" href=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css\" rel=\"stylesheet\" />
		
		<style type=\"text/css\">
		
			
			body {background-image:url(./images/backgradient.jpg);background-repeat:repeat;font-family:Arial, Helvetica, sans-serif; font-size:0.9em;}
			#body {margin-left:auto; margin-right: auto; background-color: #FFF; width: 1024px; height: 600px; border:thin #000000 solid;}
			#smadslogo {height: 120px; width: 120px; text-align: center;}
			#smadslogo img {width: 108px; height: 108px;}
			#header {font-family: Arial, Helvetica, sans-serif; vertical-align: center; text-align: center; height: 80px; font-size: 3.0em}
			#navi {vertical-align: center; text-align: center; height: 40px;}
			#content {height: 460px; max-height: 460px; vertical-align: top;}
			#insertsheader {width: 100%; overflow-y: hidden; overflow-x:hidden;}
			#contentdiv {width: 100%; height: 400px; max-height: 455px; overflow-x: hidden; overflow-y: auto}
			#report { border-collapse:collapse; width: 925px; margin-left: auto; margin-right: auto;}
			#report2 { border-collapse:collapse; width: 925px; margin-left: auto; margin-right: auto;}
			#report td.adrep {width: 250px;}
			#report td.created {width: 100px;}
			#report td.updated {width: 100px;}
			#report td.issue {width: 100px;}
			#report td.status {width: 100px;}
			#report td.designstatus {width: 205px;}
			#report td.billingstatus {width: 50px;}
			#report td.arrow {width: 1px;}
			#report2 th.adrep {width: 250px;}
			#report2 th.created {width: 100px;}
			#report2 th.updated {width: 100px;}
			#report2 th.issue {width: 100px;}
			#report2 th.status {width: 100px;}
			#report2 th.designstatus {width: 205px;}
			#report2 th.billingstatus {width: 73px;}
			#report td.adrep {text-align: center;}
			#report h4 { margin:0px; padding:0px;}
			#report img { float:right;}
			#report ul { margin:10px 0 10px 40px; padding:0px;}
			#report2 th { background:#7CB8E2 url(./images/header_bkg.png) repeat-x scroll center left; color:#fff;  text-align:left; padding: 6px 10px; text-decoration:underline;}
			#report td { background:#C7DDEE none repeat-x scroll center left; color:#000;  padding: 6px 10px;}
			#report td.arrow{padding: 0px}
			#report tr.odd td { background:#fff url(./images/row_bkg.png) repeat-x scroll center left; cursor:pointer; }
			#report div.arrow { background:transparent url(./images/arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
			#report div.up { background-position:0px 0px;}
			A.info:link {color: #000;}
			A.info:visited {color: #000;}
			A.info:active {color: #000;}
			A.info:hover {color: #000;}
		
			/*scrollpane custom CSS*/
			.jspVerticalBar {
				width: 8px;
				background: transparent;
				right:10px;
			}
			 
			.jspHorizontalBar {
				bottom: 5px;
				width: 100%;
				height: 8px;
				background: transparent;
			}
			.jspTrack {
				background: transparent;
			}
			 
			.jspDrag {
				background: url(./images/transparent-black.png) repeat;
				border-radius:4px;
			}
			 
			.jspHorizontalBar .jspTrack,
			.jspHorizontalBar .jspDrag {
				float: left;
				height: 100%;
			}
			 
			.jspCorner {
				display:none;
			}			
			
			div.centered{
			
				margin-left: auto;
				margin-right: auto;
				text-align: center;
			
			}
			
			div.error{
			
				margin: 5px;
				color: red;
			
			}
			
			label.above {
				display: block;
				margin-top: 20px;
				margin-left: 5px;
				margin-right: 5px;
				letter-spacing: 2px;
			}
			
			label.sameline {
				margin-top: 20px;
				margin-left: 10px;
				letter-spacing: 2px;
			}
			
			/* Style the text boxes */
			input.text, textarea.text {
				background: #efefef;
				border: 2px solid #cdcdcd;
				color: #3a3a3a;
				padding: 7px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
				resize: none;
			}
			
			/* Style the text boxes */
			input.stdinput, textarea.stdinput {
				background: #efefef;
				border: 2px solid #cdcdcd;
				color: #3a3a3a;
				padding: 7px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
				resize: none;
			}
			
			select {
				background: #efefef;
				border: 2px solid #cdcdcd;
				color: #3a3a3a;
				padding: 6px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
			}
			
			select.normalsize {
				
				width: 160px;
			
			}
			
			input.stdbutton {
				background: #dfdfdf;
				border:2px solid #bcbcbc;
				color: #3a3a3a;
				padding-right: 12px;
				padding-left: 12px;
				padding-top: 6px;
				padding-bottom: 6px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
			}
			
			input.smallbutton {
				background: #dfdfdf;
				border:2px solid #bcbcbc;
				color: #3a3a3a;
				padding-right: 12px;
				padding-left: 12px;
				padding-top: 1px;
				padding-bottom: 1px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
			}
			
			input.altbutton {
				background: #FDC68A;
				border:2px solid #bcbcbc;
				color: #3a3a3a;
				padding-right: 12px;
				padding-left: 12px;
				padding-top: 6px;
				padding-bottom: 6px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
			}
			
			.bluefocus:focus, .bluefocus:focus {
				border: 2px solid #97d6eb;
				outline: none;
			}
			
			.bluefocus:hover, .bluefocus:hover {
				border: 2px solid #97d6eb;
				outline: none;
			}

		</style>
		
		<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\"></script>
		<script src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js\"></script>
		<script type=\"text/javascript\" src=\"./javascripts/jquery.mousewheel.js\"></script>
		<script type=\"text/javascript\" src=\"./javascripts/jquery.jscrollpane.js\"></script>
	
		
		".$this->getBody()->getScriptsHTML()."
	
	</head>

	<body>
	
	<table id=\"body\" border=\"0\">
	
		<tr>
			<td id=\"smadslogo\" rowspan=\"2\"><img src=\"./images/SMADslogo.gif\"></td>
			<td id=\"header\">STME WebAds System</td>
		</tr>
		<tr>
		
			<td id=\"navi\">".$this->getNavigation()->generateHTML()."</td>
		
		</tr>
		<tr>
			<td id=\"content\" rowspan=\"2\" colspan=\"2\">".$this->getBody()->generateHTML()."</td>
		</tr>
	
	</table>
	
	</body>

</html>";
		
		return $page;
	
	}

}

?>