<?php 

#Url class
#Handy Framework
#Developed by Leandro Curioso [leandro.curioso@gmail.com]

class Url { 

	//Atributes
	private $serverName;
	private $httpHost;
	private $protocol;
	private $uri;
	private $fullQueryString;
	private $GET;
	private $urls = array();
	
	//Methods
	
	//Construct
	public function __construct(){
		$this->serverName = $_SERVER['SERVER_NAME'];
		$this->httpHost = $_SERVER['HTTP_HOST'];
		$this->uri = $_SERVER['REQUEST_URI'];
		$this->fullQueryString = $_SERVER['QUERY_STRING'];
		self::setProtocol();
		self::setUrls();
	}
	
	//Get protocol
	public function setProtocol()
    {
        $this->protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    }
	
	//Set urls
	public function setUrls(Sanitize $cleanUrls = NULL){
		if(!$cleanUrls){
			$url_uri  = $this->uri . "?";
			$url_pos  = strpos( $url_uri, "?" );
			$url_site = substr( $url_uri, 0, $url_pos );
			$urls     = explode( "/", $url_site );
			array_shift( $urls );
			$this->urls = $urls;
		}else{
			$this->urls = $cleanUrls;
		}
	}
	
	//Set get
	public function setGet(Sanitize $get){
		$this->GET = $get;
	}
	
	//Get get
	public function getGet(){
		return $this->GET;
	}
	
	//Get urls
	public function getUrls(){
		return $this->urls;
	}
	
	//Get url position
	public function getUrlPosition($position){
		$urls = self::GetUrls();
		return $urls[$position];
	}

}
?>