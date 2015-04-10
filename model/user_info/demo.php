<?php

/**
 * by simonLau 2015-03-17
 */
class user_info_demo_Model extends Model{
    function init(){
       $this->_finderDemoDB = Load::table_ext('finder_demo', 'db_cfg_finder');
    }
    function read_demo(){
        $sql = "select * from finder_demo";
        $data = $this->_finderDemoDB->queryAll($sql);
        return $data;
    }
}
