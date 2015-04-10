<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include '../../htdocs/index.php';
class demo_Controller extends Controller {

    function init() {
        $this->_Demo = Load::model('demo', 'user_info');
    }

    function testAction() {
        $data = $this->_Demo->read_demo();
        $name = $data[0]["user_name"];
        $tpl = "user_info_demo.tpl";
        $this->assign("Name", $name);
        $this->display($tpl);
    }
    
} 
