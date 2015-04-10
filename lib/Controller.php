<?php

/**
 * App Framework
 * write by simonLau 2014-03-16
 */
abstract class Controller
{

    protected $tpl = null;
    protected $_request = null;
    protected $_response = null;
    protected $_baseurl = null;
    protected $_pageurl = null;

    function __construct()
    {

        $this->_request = Q_Request::getInstance();
        $this->_response = Q_Response::getInstance();
        $this->tpl = Q_View::getInstance();      
        $this->init();
    }

    function init()
    {
        
    }

    function __call($methodName, $args)
    {
        if ('Action' == substr($methodName, -6))
        {
            $action = substr($methodName, 0, strlen($methodName) - 6);
            throw new Q_Exception(sprintf('Action "%s" does not exist and was not trapped in __call()', $action), 404);
        }
        throw new Q_Exception(sprintf('Method "%s" does not exist and was not trapped in __call()', $methodName), 500);
    }

    function _get($key = null, $default = null)
    {
        if ($key === null)
        {
            return $this->_request->getParams();
        }
        return $this->_request->getParam($key, $default);
    }

    function _set($key, $value)
    {
        $this->_request->setParam($key, $value);
    }

    function _forward($action, $controller = null, $module = 'currentModule')
    {
        if (null !== $controller)
        {
            $this->_request->setControllerName($controller);
        }

        if ($module !== 'currentModule')
        {
            $this->_request->setModuleName($module);
        }
        $this->_request->setActionName($action);
        Q_Front::getInstance()->dispatch();
    }

    function _redirect($url)
    {
        if (is_array($url))
        {
            $url = $this->tpl->get_url($url);
        }
        elseif (substr($url, 0, 1) === '/')
        {
            $url = $this->tpl->get_url() . $url;
        }
        elseif (!strstr($url, '.'))
        {
            $url = $this->tpl->get_url(array('action' => $url));
        }
        $this->_response->redirect($url);
    }

    function showmsg($msg, $type = null)
    {
        if ($type === null)
        {
            $this->assign('jumpurl', $_SERVER['HTTP_REFERER']);
            $type = 0;
        }
        elseif (is_array($type))
        {
            $this->assign('jumpurl', $this->tpl->get_url($type));
            $type = 0;
        }
        elseif (substr($type, 0, 1) === '/')
        {
            $this->assign('jumpurl', $this->tpl->get_url() . $type);
            $type = 0;
        }
        elseif (is_string($type))
        {
            $this->assign('jumpurl', $this->tpl->get_url(array('action' => $type)));
            $type = 0;
        }
        
        $this->assign('isAjax', $this->_request->isAjaxRequest());
        $this->assign('msg', (array) $msg);
        $this->assign('type', intval($type));
        $this->display('message.tpl');
        exit;
    }
    
    function showAjaxMsg($msg, $error = 0)
    {
        $result = array('resultCode'=>$error,'msg'=>$msg);
        echo json_encode($result);
        exit;
    }

    function assign($tpl_var, $value = null)
    {
        $this->tpl->assign($tpl_var, $value);
    }

    function display($tpl = null, $cache_id = null, $compile_id = null)
    {
        $module = $this->_request->getModuleName();
        $module&&$this->tpl->addModuleDir($module);  
        if ($tpl === null)
        {
            $controller = $this->_request->getControllerName();
            $action = $this->_request->getActionName();
            $tpl = $controller . '_' . $action . '.tpl';
        }
        $this->tpl->display($tpl, $cache_id, $compile_id);
    }

    function accessCheck($user=null, $action=null, $para=null)
    {
        return;
    }

}