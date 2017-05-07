<?php
Class defaultEncryption {
	
	protected $iv= "";
	protected $key = "";
	protected $method = "";
	
	public function __construct() {	
		$this->iv = openssl_random_pseudo_bytes(16);
		$this->key = openssl_random_pseudo_bytes(16);
		$this->method = "AES-256-CTR";
	}
	
	public function encrypt($string) {
		$string = openssl_encrypt($string, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);
		return base64_encode($string);
	}
	public function decrypt($string) {
		$string = base64_decode($string);
		return openssl_decrypt($string, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);
	}
}
?>
