<?php

class Q_Db {

    protected $_config = array();
    protected $_rdb = null;
    protected $_wdb = null;
    protected $_queryFromExec = false;

    public function __construct(array $config) {
        if (!isset($config['dbname']) || !isset($config['write'])) {
            throw new Q_Exception("config array error : dbname/write required");
        }
        $this->_config = $config;
    }

    public function getConfig() {
        return $this->_config;
    }

    public function closeDb() {
        $this->_rdb = $this->_wdb = null;
    }

    public function setQueryFromExec($type) {
        $this->_queryFromExec = $type;
    }

    protected function _connect($config) {
        if (!isset($config['dbhost']) || !isset($config['username']) || !isset($config['password'])) {
            throw new Q_Exception("config array error : dbhost/username/password/dbname required");
        }
        $dsn = 'mysql:' . 'host=' . $config['dbhost'] . ';dbname=' . $this->_config['dbname'];
        if (isset($config['port'])) {
            $dsn .= ';port=' . $config['port'];
        }
        $driver_options = array();
        if (isset($this->_config['charset'])) {
            $driver_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET character_set_connection=" . $this->_config['charset'] . ", character_set_results=" . $this->_config['charset'] . ", character_set_client=binary,sql_mode=''";
        }
        try {
            $db = new PDO($dsn, $config['username'], $config['password'], $driver_options);
        } catch (PDOException $e) {
            throw new Q_Exception($e->getMessage(), $e->getCode());
        }
        return $db;
    }

    protected function _rconnect() {
        if ($this->_rdb) {
            return $this->_rdb;
        }
        if (!isset($this->_config['read'])) {
            $this->_rdb = $this->_wconnect();
        } else {
            $this->_rdb = $this->_connect($this->_config['read']);
        }
        return $this->_rdb;
    }

    protected function _wconnect() {
        if ($this->_wdb) {
            return $this->_wdb;
        }
        $this->_wdb = $this->_connect($this->_config['write']);
        return $this->_wdb;
    }

    protected function _query($sql) {
        //var_dump($sql);
        if ($this->_queryFromExec) {
            $this->_wconnect();
            if (!$stmt = $this->_wdb->query($sql)) {
                $tmparr = $this->_wdb->errorInfo();
                throw new Q_Exception($tmparr[2] . ', SQL:' . $sql, $tmparr[1]);
            }
        } else {
            $this->_rconnect();
            if (!$stmt = $this->_rdb->query($sql)) {
                $tmparr = $this->_rdb->errorInfo();
                throw new Q_Exception($tmparr[2] . ', SQL:' . $sql, $tmparr[1]);
            }
        }
        return $stmt;
    }

    protected function _exec($sql) {
        $this->_wconnect();
        //var_dump($sql);
        if (($rowCount = $this->_wdb->exec($sql)) === false) {
            $tmparr = $this->_wdb->errorInfo();
            throw new Q_Exception($tmparr[2] . '), SQL(' . $sql, $tmparr[1]);
        }
        return $rowCount;
    }

    public function query($sql) {
        return $this->_query($sql);
    }

    public function exec($sql) {
        return $this->_exec($sql);
    }

    /**
     *
     * @param string  $sql        An SQL SELECT statement.
     * @param mixed   $bind       Data to bind into SELECT placeholders.
     * @param mixed   $fetchMode  Override current fetch mode.
     * @return array
     */
    public function fetchAll($sql) {
        $stmt = $this->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *
     * @param string|Q_Db_Select $sql An SQL SELECT statement.
     * @param mixed $bind Data to bind into SELECT placeholders.
     * @param mixed              $fetchMode Override current fetch mode.
     * @return array
     */
    public function fetchRow($sql) {
        $stmt = $this->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function fetchOne($sql, $i = 0) {
        $stmt = $this->query($sql);
        return $stmt->fetchColumn($i);
    }

    /**
     * insert an item
     *
     * @param string table name
     */
    public function insert($table, array $bind) {
        $cols = array();
        $vals = array();
        foreach ($bind as $col => $val) {
            $cols[] = "`$col`";
            $vals[] = "'$val'";
        }
        $sql = "INSERT INTO `" . $table . '` (' . implode(', ', $cols) . ') ' . 'VALUES (' . implode(', ', $vals) . ')';
        return $this->exec($sql);
    }

    public function lastInsertId() {
        $this->_wconnect();
        return $this->_wdb->lastInsertId();
    }

    public function update($table, array $bind, $where = '') {
        $set = array();
        foreach ($bind as $col => $val) {
            $set[] = "`$col` = '" . $val . "'";
        }
        $sql = "UPDATE `" . $table . '` SET ' . implode(', ', $set) . (($where) ? " WHERE $where" : '');
        return $this->exec($sql);
    }

    public function delete($table, $where = '') {
        $sql = "DELETE FROM `" . $table . (($where) ? "` WHERE $where" : '`');
        return $this->exec($sql);
    }

    public function listTables() {
        $stmt = $this->query('SHOW TABLES');
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public function describeTable($tableName) {
        $sql = 'DESCRIBE `' . $tableName . '`';
        $stmt = $this->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        $desc = array();
        $i = 1;
        $p = 1;
        foreach ($result as $row) {
            list($length, $scale, $precision, $unsigned, $primary, $primaryPosition, $identity) = array(null, null, null, null, false, null, false);
            if (preg_match('/unsigned/', $row[1])) {
                $unsigned = true;
            }

            if (preg_match('/^((?:var)?char)\((\d+)\)/', $row[1], $matches)) {
                $row[1] = $matches[1];
                $length = $matches[2];
            } else if (preg_match('/^decimal\((\d+),(\d+)\)/', $row[1], $matches)) {
                $row[1] = 'decimal';
                $precision = $matches[1];
                $scale = $matches[2];
            } else if (preg_match('/^((?:big|medium|small|tiny)?int)\((\d+)\)/', $row[1], $matches)) {
                $row[1] = $matches[1];
                $length = $matches[2];
            }
            if (strtoupper($row[3]) == 'PRI') {
                $primary = true;
                $primaryPosition = $p;
                if ($row[5] == 'auto_increment') {
                    $identity = true;
                } else {
                    $identity = false;
                }
                ++$p;
            }
            $desc[$row[0]] = array(
                'SCHEMA_NAME' => $schemaName,
                'TABLE_NAME' => $tableName,
                'COLUMN_NAME' => $row[0],
                'COLUMN_POSITION' => $i,
                'DATA_TYPE' => $row[1],
                'DEFAULT' => $row[4],
                'NULLABLE' => (bool) ($row[2] == 'YES'),
                'LENGTH' => $length,
                'SCALE' => $scale,
                'PRECISION' => $precision,
                'UNSIGNED' => $unsigned,
                'PRIMARY' => $primary,
                'PRIMARY_POSITION' => $primaryPosition,
                'IDENTITY' => $identity
            );
            ++$i;
        }
        return $desc;
    }

}
