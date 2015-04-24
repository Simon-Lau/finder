<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class setting_Controller extends Controller {
    function init() {
        $this->_User = Load::model('user', 'user_info');
    }
    
    function indexAction() {
        $tpl = "user_info_setting.tpl";
        session_start();
        $this->assign("user_id", $_SESSION['user_id']);
        $this->assign("user_name", $_SESSION['user_name']);
        $this->assign("user_rank",  $_SESSION['user_rank']);
        $this->assign('user_pic_id', $_SESSION['user_pic_id']);
        $this->assign('user_type',  $_SESSION['user_type']);
        $this->display($tpl);
    }
}
