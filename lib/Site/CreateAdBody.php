<?php

require_once './lib/Site/Page.php';
require_once './lib/DB/Size.php';

class CreateAdBody extends Body{

	private $context;

	public function __construct($context){
		$this->context = $context;
	}

	public function getTitle(){

		return "Create Ad";

	}

	public function getScriptsHTML(){
		return "<script type=\"text/javascript\">
			$(document).ready(function(){
				$('.date').datepicker();
			})
		</script>";
	}

	public function generateHTML(){

		return $this->context->getErrorHTML()."<div class=\"centered\" style=\"width: 55%\">
		<form action=\"index.php?pageid=createAd\" method=\"POST\" enctype=\"multipart/form-data\">
		<div class=\"centered\">
			<br /><input name=\"sites[]\" type=\"checkbox\" value=\"exit109\" checked> Exit109
			<input name=\"sites[]\" type=\"checkbox\" value=\"roctv\" checked> RocTv 
			<input name=\"sites[]\" type=\"checkbox\" value=\"whim\" checked> Whim 
			<input name=\"sites[]\" type=\"checkbox\" value=\"tartan\" checked> Tartan 
			<input name=\"sites[]\" type=\"checkbox\" value=\"beehive\" checked> Beehive 
			<input name=\"sites[]\" type=\"checkbox\" value=\"rfr\" checked> RFR
			<br />
		</div>
		<div style=\"float: left; text-align: left;\">
			<label for=\"name\" class=\"above\">Name</label>
			<input type=\"text\" name=\"name\" placeholder=\"Name\" class=\"bluefocus text\" tabindex=\"1\"\>
			<label for=\"start\" class=\"above\">Starting Date</label>
			<input type=\"text\" readonly name=\"start\" placeholder=\"Starting Date\" class=\"bluefocus text date\" tabindex=\"3\"\><br />
			<label for=\"start\" class=\"above\">Ending Date</label>
			<input type=\"text\" readonly name=\"end\" placeholder=\"Ending Date\" class=\"bluefocus text date\" tabindex=\"4\"\><br /><br />
			<!--<input type=\"button\" name=\"selectimage\" value=\"Select Sample Image\" onclick=\"javascript:$('#image').show();$('#image').focus();$('#image').click();$('#image').hide();\" class=\"stdbutton bluefocus\" tabindex=\"4\">-->
		</div>
		<div style=\"float: right; text-align: right;\">
			<label for=\"name\" class=\"above\">Click Url</label>
			<input type=\"text\" name=\"url\" placeholder=\"Click Url\" class=\"bluefocus text\" tabindex=\"2\"\>
			<label for=\"size\" class=\"above\">Size</label>
			".Size::getSelectHTHL("size", 5)."<br /><br />
			
			<input type=\"file\" name=\"image\" id=\"image\" style=\"\" tabindex=\"6\"/><br />
			<input type=\"submit\" value=\"Create\" class=\"stdbutton bluefocus\" tabindex=\"7\"/>
		</div>
		<input type=\"hidden\" name=\"action\" value=\"createAd\" />
		</form>
		
		</div>"; 

	}

}

?>
