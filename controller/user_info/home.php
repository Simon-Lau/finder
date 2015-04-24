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
//        $where = array();
//        $where[] = 'mood_type = 2 or mood_type = 3';
        $timeline = $this->_User->getUserMoodList();
        session_start();
        $this->assign("user_id", $_SESSION['user_id']);
        $this->assign("user_name", $_SESSION['user_name']);
        $this->assign("user_rank",  $_SESSION['user_rank']);
        $this->assign('user_pic_id', $_SESSION['user_pic_id']);
        $this->assign('user_type',  $_SESSION['user_type']);
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
        header("Location: showPage.do");
    }
    
    function showHotMoodPageAction(){
        
    }
    
    function showFriendPageAction(){
        
    }
    
    function ajaxGetReviewAction(){
        
    }
    
    function ajaxAddReviewAction(){
        $mood_id = $this->_get('mood_id');
        $data_review = $this->_get('review');
        $where =  $mood_id;
        if($data_review == 1){
            $data ='mood_user_like = mood_user_like +1';
        }else if($data_review == 0 ){
            $data = 'mood_user_hit = mood_user_hit +1';
        }
        $this->_User->updateUserMoodTable($data, $where);
        $temp = $this->_User->getUserMoodByIds(array('mood_id' =>$mood_id));
        $result = array();
        foreach ($temp as $val){
            $result['like'] = $val['mood_user_like'];
            $result['hit'] = $val['mood_user_hit'];
        }
        echo json_encode($result);
    }
    
    function ajaxAddReviewContentAction(){
        $mood_id = $this->_get('mood_id');
        $review_user_id = $this->_get('review_user_id');
        $user_id = $this->_get('user_id');
        $review_content = $this->_get('review_content');
        $review_time = date("Ymd", time());
        $where = array();
        $where['mood_id'] = $mood_id;
        $where['review_user_id'] = $review_user_id;
        $where['user_id'] = $user_id;
        $where['review_content'] = $review_content;
        $where['review_time'] = $review_time;
        $this->_User->insertUserReviewTable($where);
    }
    
    function ajaxGetReviewContentAction(){
        $mood_id = $this->_get('mood_id');
        $where =array();
        $where['mood_id'] = $mood_id;
        $temp = $this->_User->getUserReviewByIds($where);
        $result = array();
        $result['review'] = $temp;
        $result['mood_id'] = $mood_id;
        echo json_encode($result);
    }
}
