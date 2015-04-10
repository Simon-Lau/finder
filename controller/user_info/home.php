<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author tonylp
 */
class home_Controller extends Controller {
    //put your code here
    function init(){
        $this->_User = Load::model('user', 'user_info');
    }
    
    function showPageAction(){
        $tpl = "user_info_home.tpl";
        $timeline = $this->_User->getUserMoodList();
        $this->assign("timeline", $timeline);
        $this->display($tpl);
    }
    
    function addNewMoodAction(){
        $user_id = $this->_get("user_id");
        $user_name = $this->_get("user_name");
        $publish_time = date("Ymd", time());
        $mood_content = $this->_get("mood_content");
        $mood_type = $this->_get("mood_type");   //mood type 1 self 2 public 3 friends
        $mood_url = $this->_get("mood_url");
        $mood_pic_id = $this->_get("mood_pic_id");
        $where =array();
        $where['user_id'] = $user_id;
        $where['user_name'] = $user_name;
        $where['publish_time'] = $publish_time;
        $where['mood_content'] = $mood_content;
        $where['mood_type'] = $mood_type;
        $where['mood_url'] =  $mood_url;
        $where['mood_pic_id'] = $mood_pic_id;
        $where['mood_state'] = 1;
        $this->_User->insertUserMoodTable($where);
        $this->showPageAction();
    }
    
    function showHotMoodPageAction(){
        
    }
    
    function showFriendPageAction(){
        
    }
    
    function ajaxGetReviewAction(){
        
    }
    
    function ajaxAddReviewAction(){
        
    }
}
