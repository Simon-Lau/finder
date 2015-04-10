<?php
define('Q_APP_NAME', 'admin');
define('Q_ROOT_DIR', dirname(dirname(__FILE__))); // /finder
define('Q_CTRL_DIR', Q_ROOT_DIR.'/controller');
define('Q_CONF_DIR', Q_ROOT_DIR.'/config');
define('Q_LIB_DIR', Q_ROOT_DIR.'/lib');
define('Q_MOD_DIR', Q_ROOT_DIR.'/model');
define('Q_TMP_DIR', Q_ROOT_DIR.'/cache');
define("LOG_DIR", Q_ROOT_DIR.'/logs/');
define('Q_TPL_DIR', Q_ROOT_DIR.'/templates');
require Q_LIB_DIR."/smarty/Smarty.class.php";
require Q_LIB_DIR."/Model.php";
require Q_LIB_DIR."/Db_Table.php";
require Q_LIB_DIR."/Db.php";
require Q_LIB_DIR."/Controller.php";
require Q_LIB_DIR."/Load.php";
require Q_LIB_DIR."/Request.php";
require Q_LIB_DIR."/Response.php";
require Q_LIB_DIR."/View.php";
require Q_LIB_DIR."/Exception.php";
require Q_LIB_DIR."/Front.php";