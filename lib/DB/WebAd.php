<?php

class WebAd {

	private $id;
	private $name;
	private $startingMonday;
	private $size;
	private $image;
	private $impressions;
	private $clicks;
	private $redirectUrl;
	
	public function __construct($id, $name, $monday, $size, $image, $impressions, $clicks, $redirectUrl){
		
		$this->id = $id;
		$this->name = $name;
		$this->monday = $monday;
		$this->size = $size;
		$this->image = $image;
		$this->impressions = $impressions;
		$this->clicks = $clicks;
		$this->redirectUrl = $redirectUrl;
		
	}
	
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}
	
	public function getID(){
		return $this->id;
	}
	public function setID($id){
		$this->id = $id;
	}
	
	public function getStartingMonday(){
		return $this->monday;
	}
	public function setStartingMonday($monday){
		$this->monday = $monday;
	}
	
	public function getSize(){
		return $this->size;
	}
	public function setSize($size){
		$this->size = $size;
	}
	
	public function getImage(){
		return $this->image;
	}
	public function setImage($image){
		$this->image = $image;
	}
	
	public function getImpressions(){
		return $this->impressions;
	}
	public function setImpressions($imgressions){
		$this->impressions = $impressions;
	}
	
	public function getClicks(){
		return $this->clicks;
	}
	public function setClicks($clicks){
		$this->clicks = $clicks;
	}
	
	public function getRedirectUrl(){
		return $this->redirectUrl;
	}
	public function setRedirectUrl($url){
		$this->redirectUrl = $url;
	}
	
	public function generateTRHTML(){
		
		return "<tr>
			<td>".$this->getName()."</td>
			<td>".$this->getStartingMonday()."</td>
			<td>".$this->getSize()."</td>
			<td>".$this->getImpressions()."</td>
			<td>".$this->getClicks()."</td>
			<form action=\"./index.php?pageid=viewAds\" method=\"POST\">
			<input type=\"hidden\" name=\"action\" value=\"deleteAd\" \>
			<input type=\"hidden\" name=\"adId\" value=\"".$this->id."\" \>
			<td><input type=\"submit\" value=\"Delete\" class=\"smallbutton bluefocus\"/></td>
			</form>
		</tr>";
		
	}
	
	public static function getDefaultAd($size, $date){
		
		return new WebAd(0, "default", $date, $size, "./ad_images/".$size.".png", 0, 0, "http://www.radford.edu/~smads/");
		
	}

}

?>