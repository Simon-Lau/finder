<?php

/**
 * App Framework
 * write by simonLau 2015-3-16
 */
class Load {

    public static $_db = array();

    // Monitor ad_data class ad_data_Monitor_Model
    public static function model($file, $module = null) {
        $class = $file . '_Model';
        if ($module) {
            $class = $module . '_' . $file . '_Model';
            $dir = array(Q_MOD_DIR . '/' . $module, Q_ROOT_DIR . '/model/' . $module);
        } else {
            $class = $file . '_Model';
            $dir = array(Q_MOD_DIR, Q_ROOT_DIR . '/model');
        }
        return self::loadClass($file, $class, $dir);    //Monitor ad_data_Monitor_Model array(/ad_data, ad/data)
    }

    public static function controller($file, $module = null) {
        $class = $file . '_Controller';
        $dir = array(Q_CTRL_DIR . '/' . $module);

        return self::loadClass($file, $class, $dir);
    }

    public static function loadClass($file, $class, $dirs = null) {
        self::loadFile($file, $dirs, true);
        return new $class();
    }

    public static function db($db = null, $instance = true) {
        $key = 'Q_Db_' . $db;
        if ($instance && self::$_db[$key]) {
            return self::$_db[$key];
        }
        $dbconfig = self::loadFile('db', Q_CONF_DIR, false);
        if ($db)
            $dbconfig['prefix'] = $db . '_';
        if (!$dbconfig) {
            throw new Q_Exception("db config $db not set.");
        }
        require_once Q_CORE_DIR . '/Db.php';
        $db = new Q_Db($dbconfig);
        if ($instance)
            self::$_db[$key] = $db;
        return $db;
    }

    public static function table($table, $db = null) {
        if ($db === null) {
            $db = self::db();
        } elseif (is_string($db)) {
            $db = self::db($db);
        }
        require_once Q_LIB_DIR . '/Db_Table.php';
        return new Q_Db_Table(array('name' => $table, 'db' => $db));
    }

    /**
     * 带有数据库配置参数的db函数 leozhong 20110125
     * @param <type> $instance
     * @param <string> $dbcfgname
     * @return Q_Db
     */
    public static function db_ext($dbcfgname = 'db', $instance = true) {
        $dbconfig = self::loadFile($dbcfgname, Q_CONF_DIR, false);
        $key = 'Q_Db_' . $dbconfig['dbname'];
        if (!$dbconfig) {
            throw new Q_Exception("db config {$dbconfig['dbname']} not set.");
        }
        require_once Q_LIB_DIR . '/Db.php';
        $db = new Q_Db($dbconfig);
        if ($instance) {
            self::$_db[$key] = $db;
        }
        return $db;
    }

    /**
     * 带有数据库配置参数的table函数 leozhong 20110125
     * @param <type> $table
     * @param <type> $db
     * @param <string> $dbcfgname
     * @return Q_Db_Table
     */
    public static function table_ext($table, $dbcfgname) {
        if (null == $dbcfgname || !is_string($dbcfgname)) {
            return null;
        }
        $db = self::db_ext($dbcfgname, true);
        require_once Q_LIB_DIR . '/Db_Table.php';
        return new Q_Db_Table(array('name' => $table, 'db' => $db));
    }

    public static function loadFile($file, $dirs = null, $once = false) {
        $file .= '.php';
        if ($dirs !== null) {
            foreach ((array) $dirs as $dir) {
                $filename = $dir . '/' . $file;
                if (file_exists($filename)) {
                    break;
                }
            }
        }
        if ($once) {
            $result = include_once($filename);
        } else {
            $result = include($filename);
        }
        return $result;
    }

}
