<?php
/**
 * App Framework
 * write by kinglv 2009-6-22
 */
class Q_Response
{
	protected static $_instance = null;

	protected $_exceptions = array();

	public static function getInstance(){
		if (null === self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function redirect($url, $code = 302){
		header('Location: ' . $url, true, $code);
		exit;
	}

	public function setHttpResponseCode($code){
		header('HTTP/1.1 ' . $code);
		return $this;
	}

	public function send($content = null){
		echo $content;
		exit;
	}
}
