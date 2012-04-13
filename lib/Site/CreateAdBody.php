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
			<br /><input name=\"exit109\" type=\"checkbox\" checked> Exit109 
			<input name=\"roctv\" type=\"checkbox\" checked> RocTv 
			<input name=\"whim\" type=\"checkbox\" checked> Whim 
			<input name=\"tartan\" type=\"checkbox\" checked> Tartan 
			<input name=\"beehive\" type=\"checkbox\" checked> Beehive 
			<input name=\"rfr\" type=\"checkbox\" checked> RFR
			<br />
		</div>
		<div style=\"float: left; text-align: left;\">
			<label for=\"name\" class=\"above\">Name</label>
			<input type=\"text\" name=\"name\" placeholder=\"Name\" class=\"bluefocus text\" tabindex=\"1\"\>
			<label for=\"start\" class=\"above\">Starting Monday</label>
			<input type=\"text\" readonly name=\"start\" placeholder=\"Starting Monday\" class=\"bluefocus text date\" tabindex=\"3\"\><br /><br />
			<!--<input type=\"button\" name=\"selectimage\" value=\"Select Sample Image\" onclick=\"javascript:$('#image').show();$('#image').focus();$('#image').click();$('#image').hide();\" class=\"stdbutton bluefocus\" tabindex=\"4\">-->
		</div>
		<div style=\"float: right; text-align: right;\">
			<label for=\"name\" class=\"above\">Click Url</label>
			<input type=\"text\" name=\"url\" placeholder=\"Click Url\" class=\"bluefocus text\" tabindex=\"2\"\>
			<label for=\"size\" class=\"above\">Size</label>
			".Size::getSelectHTHL("size", 4)."<br /><br />
			<input type=\"submit\" value=\"Create\" class=\"stdbutton bluefocus\" tabindex=\"6\"/>
		</div>
		<input type=\"hidden\" name=\"action\" value=\"createAd\" />
		<input type=\"file\" name=\"image\" id=\"image\" style=\"\" tabindex=\"5\"/>
		</form>
		
		</div>"; 

	}

}

?>
