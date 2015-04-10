<?php

/**
 * by simonLau 2015-03-27
 */

class user_info_user_Model extends Model{
    function init(){
       $this->_finderUserDB = Load::table_ext('user_table', 'db_cfg_finder');
       $this->_finderUserInfoDB = Load::table_ext("user_information_table", 'db_cfg_finder');
       $this->_finderUserLocDB = Load::table_ext("user_location_table", 'db_cfg_finder');
       $this->_finderUserMoodDB = Load::table_ext("user_mood_table", 'db_cfg_finder');
       $this->_finderUserChatDB = Load::table_ext("user_chat_table", 'db_cfg_finder');
       $this->_finderUserReviewDB = Load::table_ext("user_review_table", "db_cfg_finder");
       $this->_finderUserActDB = Load::table_ext("user_activity_table", "db_cfg_finder");
       $this->_finderHotMoodDB = Load::table_ext("hot_mood_table", "db_cfg_finder");
       $this->_finderFriendDB = Load::table_ext("friend_table", "db_cfg_finder");
       
    }
    function read_demo(){
        $sql = "select * from finder_demo";
        $data = $this->_finderDemoDB->queryAll($sql);
        return $data;
    }
    
    public function loginUserByIds($user_id, $password){
        $sql = "Select * from user_table where ( user_name = '". $user_id . "' or user_phone = '". $user_id . "' ) and user_password = '". $password."'";
        $ret = $this->_finderUserDB->queryAll($sql);
        $result = array();
        foreach ($ret as $val){
          $result  = $val;
        }
        return $result;
    }
    
    public function getUserByIds($where){
        $where['enabled'] = 1;
        $ret = $this->_finderUserDB->fetchAll($where);
        $result = array();
        foreach ($ret as $val){
            $result[$val['user_id']] = $val;
        }
        return $result;
    }
    
    public function insertUserTable($data){
        $sql = "INSERT INTO user_table (user_name, user_phone, user_pic_id, user_password, user_email, user_rank, enabled) VALUES (";
        $sql .= "'".$data['user_name']."',";
        $sql .= "'".$data['user_phone']."',";
        $sql .= "'".$data['user_pic_id']."',";
        $sql .= "'".$data['user_password']."',";
        $sql .= "'".$data['user_email']."',";
        $sql .= "1, 1 )";
//        $doneSQL = substr($sql, 0, strlen($sql) - 1);
        $this->_finderUserDB->query($sql);
    }
    
    public function updateUserTable($data){
        
    }
    
    public function delUserTable($data){
        
    }
    
    public function insertUserInfoTable($data){
        $sql = "INSERT INTO user_information_table (user_id, user_name, user_email,user_website, user_message, user_age, user_birth, user_pic_id, user_gender, user_phone) VALUES (";
        $sql .= "'".$data['user_id']."',";
        $sql .= "'".$data['user_name']."',";
        $sql .= "'".$data['user_email']."',";
        $sql .= "'".$data['user_website']."',";
        $sql .= "'".$data['user_message']."',";
        $sql .= "'".$data['user_age']."',";
        $sql .= "'".$data['user_birth']."',";
        $sql .= "'".$data['user_pic_id']."',";
        $sql .= "'".$data['user_gender']."',";
        $sql .= "'".$data['user_phone']."')";
        $this->_finderUserDB->query($sql);
        
    }
    
    public function insertUserMoodTable($data){
        $sql = "INSERT INTO user_mood_table (user_id, user_name, publish_time, mood_content, mood_type, mood_url, mood_pic_id, mood_state) VALUES (";
        $sql .= "'".$data['user_id']."',";
        $sql .= "'".$data['user_name']."',";
        $sql .= "'".$data['publish_time']."',";
        $sql .= "'".$data['mood_content']."',";
        $sql .= "'".$data['mood_type']."',";
        $sql .= "'".$data['mood_url']."',";
        $sql .= "'".$data['mood_pic_id']."',";
        $sql .= "'".$data['mood_state']."')";
        $this->_finderUserMoodDB->query($sql);
    }
    
    public function getUserMoodList($where = null){
      $result = array();
      $order = "publish_time desc";
      $ret = $this->_finderUserMoodDB->pageAll(20, $where, $order);
      $user_where = array();
      $mood_where = array();
      if(!empty($ret)){
          foreach($ret as $val){
             $user_where['user_id'][] = $val['user_id'];
             $mood_where['mood_id'][] = $val['mood_id'];
          }
      }
      $user_temp_data = $this->_finderUserDB->fetchAll($user_where);
      $user_data = array();
      foreach ($user_temp_data as $val){
          $user_data[$val['user_id']] = $val;
      }
      $i = 0;
      foreach($ret as $val){
          $user_id = $val['user_id'];
          $mood_id = $val['mood_id'];
          $result[$i]['user_name'] = $val['user_name'];
          $result[$i]['mood_content'] = $val['mood_content'];
          $result[$i]['mood_pic_id'] = $val['mood_pic_id'];
          $result[$i]['publish_time'] = $val['publish_time'];
          $result[$i]['mood_type'] = $val['mood_type'];
          $result[$i]['user_like'] = $val['mood_user_like'];
          $result[$i]['user_hit'] = $val['mood_user_hit'];
          $result[$i]['mood_id'] = $mood_id;
          $result[$i]['user_pic_id'] = $user_data[$user_id]['user_pic_id'];
          $i++;
      }
      return $result;
    }
}