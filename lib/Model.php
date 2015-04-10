<?php
abstract class Model{
	protected $_error = array();
	protected $_table = null;
	protected $_check = array();
	protected $_cacheKey = null;
	protected $_cache = null;

	public function __construct(){
		$this->_cacheTag = $this->_cacheKey = get_class($this);
		$this->init();
	}

	public function getError(){
		if(!$this->isError()){
			$this->_error[] = "服务器繁忙，请稍后重试。";
		}
		return $this->_error;
	}

	protected function setError($error){
		if(is_array($error)){
			$this->_error = $error;
		}elseif(is_string($error)){
			$this->_error[] = $error;
		}
		return $this;
	}

	protected function isError(){
		return !empty($this->_error);
	}

	protected function checkPost($info, $check = 1){

		if($this->_check && $check > 0){
			$validator = Load::lib('validator');
			if($error = $validator->check($info, $this->_check)){
				$this->setError($error);
				return false;
			}
		}
		if($check > 1){
			if(!$_POST['formhash'] || $_POST['formhash'] != $_COOKIE['formhash']){
				$this->setError('表单过期，请重新提交');
				return false;
			}
			setcookie('formhash', '', -86400, '/');
		}
		return true;
	}

	function remove($id){
		$this->clearCache();
		return $this->_table->remove($id);
	}

	function save($info, $check = 1){
		if($this->_table === null){
			throw new Q_Exception('Model _table does not exist', 500);
		}

		$this->checkPost($info, $check);
		if($this->isError())
			return false;

		$this->clearCache();
		return $this->_table->save($info);
	}

	public function clearCache(){
		if($this->_cache){
			$this->_cache->removeTag($this->_cacheTag);
		}
	}

	public function setCache($data, $key=null){
		if($this->_cache){
			$key = $key ? $this->_cacheKey.$key : $this->_cacheKey;
			return $this->_cache->set($key, $data, $this->_cacheTag);
		}
	}

	public function getCache($key=null){
		if($this->_cache){
			$key = $key ? $this->_cacheKey.$key : $this->_cacheKey;
			return $this->_cache->get($key);
		}
	}

	public function init(){}

	function __call($method, $args = array())
	{
		if($this->_table === null){
			throw new Q_Exception('Model _table does not exist', 500);
		}
		return call_user_func_array(array($this->_table,$method),$args);
	}
}
?>