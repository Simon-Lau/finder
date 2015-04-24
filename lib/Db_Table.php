<?php

class Q_Db_Table {

    protected $_db = null;
    protected $_schema = null;
    protected $_name = null;
    protected $_order = null;
    protected $_group = null;
    protected $_tableName = null;
    protected $_cols = array();
    protected $_primary = null;
    protected $_identity = 0;

    public function __construct(array $config) {
        if (!isset($config['name']) || !isset($config['db'])) {
            throw new Q_Exception("config array error : 'name/db' required");
        }
        foreach ($config as $key => $value) {
            switch ($key) {
                case 'db':
                    $this->_db = $value;
                    break;
                case 'name':
                    $this->_name = (string) $value;
                    break;
                case 'master':
                    $this->isMaster((bool) $value);
                    break;
                default:
                    break;
            }
        }
        $this->_setup();
    }

    public function isMaster($type) {
        $this->_db->setQueryFromExec($type);
    }

    public function getDb() {
        return $this->_db;
    }

    /**
     * Turnkey for initialization of a table object.
     * Calls other protected methods for individual tasks, to make it easier
     * for a subclass to override part of the setup logic.
     *
     * @return void
     */
    protected function _setup() {
        $this->_setupNames();
    }

    /**
     * Initialize table and schema names.
     *
     * @return void
     */
    protected function _setupNames() {
        if (strpos($this->_name, '.')) {
            list($this->_schema, $this->_name) = explode('.', $this->_name);
        }
        $dbconfig = $this->_db->getConfig();
        $this->_schema = $dbconfig['dbname'];
        $this->_tableName = $this->_name;
    }

    /**
     * Returns table information.
     *
     * You can select to return only a part of this information by supplying its key name,
     * otherwise all information is returned as an array.
     *
     * @param  $key The specific info part to return OPTIONAL
     * @return mixed
     */
    public function info($key = null) {
        $info = array(
            'schema' => $this->_schema,
            'table' => $this->_tableName,
            'name' => $this->_name,
            'cols' => $this->_cols,
            'order' => $this->_order,
            'identity' => $this->_identity,
            'primary' => $this->_primary
        );

        if ($key === null) {
            return $info;
        }
        return $info[$key];
    }

    /**
     * fetch the table's primary key
     *
     * @return array
     */
    public function getPrimaryKey() {
        return $this->_primary;
    }

    /**
     * Fetches rows by primary key.  The argument specifies one or more primary
     * key value(s).  To find multiple rows by primary key, the argument must
     * be an array.
     * @param  mixed                    The value(s) of the primary keys.
     * @return Q_Db_Table_Rowset_Abstract  Row(s) matching the criteria.
     * @throws Q_Db_Table_Exception
     */
    public function query($sql) {
        return $this->_db->query($sql);
    }

    public function queryRow($sql) {
        return $this->_db->fetchRow($sql);
    }

    public function queryAll($sql) {
        return $this->_db->fetchAll($sql);
    }

    public function find($data, $by = null) {
        if (is_array($data)) {
            return $this->fetchRow($this->whereby($data, $by));
        } else {
            return $this->fetchRow($this->whereby(array($data), $by));
        }
    }

    public function findBy($data, $by, $order = null) {
        if (is_array($where)) {
            $where1 = $where;
            $where1[] = $this->whereby(array($data), $by);
        } elseif (is_string($where)) {
            $where1[] = $this->whereby(array($data), $by);
            $where1[] = $where;
        } else {
            $where1 = $this->whereby(array($data), $by);
        }
        return $this->fetchAll($where1, $order);
    }

    public function findAll(array $data, $by = null) {
        return $this->fetchAll($this->whereby($data, $by));
    }

    public function pageAll($count, $where = null, $order = null) {
        if (intval($count) < 1) {
            throw new Q_Exception('pageAll count must > 0.');
        }
        $request = Q_Request::getInstance();
        $sql = "SELECT * FROM `$this->_tableName`";
        if ($where) {
            $sql .= ' WHERE ' . $this->where($where);
        }

        $total = $this->fetchOne('COUNT(*)', $where);
        $sql .= $this->order($order);
        $pagesize = @ceil($total / $count);
        $request->setParam('_pagetotal', $total);
        $request->setParam('_pagesize', $pagesize);
        $page = max(1, min($pagesize, $request->getParam('page')));
        $sql .= " LIMIT " . ($page - 1) * $count . ', ' . $count;
        //echo $sql;
        $rows = $this->_db->fetchAll($sql);
        return $rows;
    }

    /**
     * Fetches all rows.
     *
     * @param string|array  $where  OPTIONAL An SQL WHERE clause
     * @param string|array  $order  OPTIONAL An SQL ORDER clause.
     * @param int          $count   OPTIONAL An SQL LIMIT count.
     * @return             Q_Db_Table_Rowset_Abstract object
     */
    public function fetchAll($where = null, $order = null, $limit = 0) {
        $sql = "SELECT * FROM `$this->_tableName`";
        if ($where) {
            $sql .= ' WHERE ' . $this->where($where);
        }
        $sql .= $this->order($order);
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        return $this->_db->fetchAll($sql);
    }

    public function fetchCols($col, $where = null, $order = null, $limit = 0) {
        $sql = "SELECT $col FROM `$this->_tableName`";
        if ($where) {
            $sql .= ' WHERE ' . $this->where($where);
        }
        $sql .= $this->order($order);
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        return $this->_db->fetchAll($sql);
    }

    /**
     *  Fetches one row
     *
     * @param string|array  $where    OPTIONAL An SQL WHERE clause. 
     * @param string|array  $order    OPTIONAL An SQL ORDER clause.
     * @return            返回Q_Db_Table_Row_Abstract对象
     */
    public function fetchRow($where = null, $order = null) {
        /**
         * 拼装sql语句
         */
        $sql = "SELECT * FROM `$this->_tableName`";

        if ($where) {
            $sql .= ' WHERE ' . $this->where($where);
        }

        $sql .= $this->order($order);

        $sql .= ' LIMIT 1';

        return $this->_db->fetchRow($sql);
    }

    public function fetchOne($col, $where = null) {
        $sql = "SELECT $col FROM `$this->_tableName`";
        if ($where) {
            $sql .= ' WHERE ' . $this->where($where);
        }
        $sql .= ' LIMIT 1';
        return $this->_db->fetchOne($sql, 0);
    }

    /**
     * 获取总条目
     *
     * 默认情况下获取表中全部记录条数
     *
     * @param   String|Array 附加的条件
     * @return  Integer
     */
    public function count($where = null) {
        /**
         * 拼装sql语句
         */
        $sql = "SELECT count(*) FROM `$this->_tableName`";

        if ($where) {
            $sql .= ' WHERE ' . $this->where($where);
        }

        /**
         * 调用PDO查询, 获取数组.
         */
        return $this->_db->fetchOne($sql, 0);
    }

    public function insert($data) {
        return $this->_insert($data);
    }

    public function update($data, $where = null) {
        return $this->_update($data, $where);
    }

    public function updateWithPk($data, $where = null) {
        return $this->_updateWithPk($data, $where);
    }

    protected function _isExist($data) {

        $pkDate = array_intersect_key($data, array_flip($this->_primary));
        if (empty($pkDate)) {
            return false;
        }
        foreach ($pkDate as $key) {
            if ('' === $key) {
                return false;
            }
        }
        $where = $this->whereby($pkDate);
        if (!$that = $this->fetchRow($where)) {
            if ($this->_identity) {
                //不允许自增主键的table插入指定的主键值
                throw new Q_Exception("data not exist in table.");
            }
            return false;
        }
        return true;
    }

    public function save($data) {

        if ($this->_isExist($data) === false) {
            return $this->_insert($data);
        }
        return $this->_update($data);
    }

    public function remove($data, $by = null) {
        return $this->_delete($data, $by);
    }

    public function delete($data, $by = null) {
        return $this->_delete($data, $by);
    }

    public function deleteAll() {
        return $this->_db->delete($this->_tableName);
    }

    /**
     * Inserts a new row.
     *
     * @param  array        $data  Column-value pairs.
     * @return int|array    The primary key of the row inserted.
     */
    public function _insert(array $data) {
        $data = $this->_filter($data);
        $pkIdentity = $this->_primary[(int) $this->_identity];
        if (!$pkData = $data[$pkIdentity]) {
            unset($data[$pkIdentity]);
        }

        $this->_db->insert($this->_tableName, $data);
        if ($this->_identity) {
            $pkData[$pkIdentity] = $this->_db->lastInsertId();
        }
        return $pkData;
    }

    /**
     * Updates existing rows.
     *
     * @param  array        $data  Column-value pairs.
     * @param  array|string $where An SQL WHERE clause, or an array of SQL WHERE clauses.
     * @return int          The number of rows updated.
     */
    public function _update(array $data, $where = null) {

        $data = $this->_filter($data);
        $pkData = array_intersect_key($data, array_flip($this->_primary));

        if (!$pkData) {
            if (!$where) {
                throw new Q_Exception("do update primary and where is empty");
            }
            $where = $this->where($where);
        } else {
            if ($where) {
                throw new Q_Exception("do update primary exist and where exist");
            }
            $where = $this->whereby($pkData);
        }
        $ret = $this->_db->update($this->_tableName, $data, $where);
        if ($pkData) {
            return $pkData;
        }
        return $ret;
    }

    /**
     * Updates with PK existing rows.
     *
     * @param  array        $data  Column-value pairs.
     * @param  array|string $where An SQL WHERE clause, or an array of SQL WHERE clauses.
     * @return int          The number of rows updated.
     */
    public function _updateWithPk(array $data, $where = null) {
        $data = $this->_filter($data);
        $pkData = array_intersect_key($data, array_flip($this->_primary));
        if (!$pkData) {
            if (!$where) {
                throw new Q_Exception("do update primary and where is empty");
            }
            $where = $this->where($where);
        }
        $ret = $this->_db->update($this->_tableName, $data, $where);
        if ($pkData) {
            return $pkData;
        }
        return $ret;
    }

    /**
     * Deletes existing rows.
     *
     * @param  array|string $where SQL WHERE clause(s).
     * @return int        The number of rows deleted.
     */
    public function _delete($data, $by = null) {

        if (is_array($data)) {
            return $this->_db->delete($this->_tableName, $this->whereby($data, $by));
        } else {
            return $this->_db->delete($this->_tableName, $this->whereby(array($data), $by));
        }
    }

    public function where($where) {
        if (is_array($where)) {
            $whereAnd = array();
            foreach ($where as $k => $v) {
                if (!is_numeric($k)) {
                    if (is_array($v)) {
                        if (count($v) == 1) {
                            $v = array_shift($v);
                            $v = "`$k`='$v'";
                        } else {
                            $v = "`$k` IN ('" . implode("','", $v) . "')";
                        }
                    } else {
                        $v = "`$k`='$v'";
                    }
                }
                $whereAnd[] = $v;
            }
            $where = '(' . implode(' AND ', $whereAnd) . ')';
        }
        return $where;
    }

    /**
     * form the sub where sql
     *
     * @param array
     * @return string
     */
    public function whereby($where, $by = null) {
        if (is_array($where)) {
            if ($by) {
                $by = (array) $by;
                foreach ($by as $k) {
                    if (!array_key_exists($k, $this->_cols)) {
                        throw new Q_Exception("primary key not in cols");
                    }
                }
            } else {
                $by = $this->_primary;
            }

            $where = array_combine($by, $where);

            $whereOrTerms = array();
            if (count($where) != count($by)) {
                throw new Q_Exception("cols not eq the num of primary key");
            }
            foreach ($where as $col => $v) {
                $whereAndTerms[] = "`$col` = '$v'";
            }
            $whereOrTerms[] = '(' . implode(' AND ', $whereAndTerms) . ')';
            $where = implode(' OR ', $whereOrTerms);
        }
        return $where;
    }

    public function setOrder($order) {
        $this->_order = $order;
    }

    protected function order($order) {
        if ($order === null) {
            $order = $this->_order;
        }
        if (empty($order)) {
            return '';
        }
        if (!is_array($order)) {
            return ' ORDER BY ' . $order;
        }
        $order = $this->_filter($order);
        $neworder = array();
        foreach ($order as $k => $v) {
            if ($v == '1' || strtolower($v) == 'asc') {
                $v = 'ASC';
            } elseif ($v == '2' || strtolower($v) == 'desc') {
                $v = 'DESC';
            } else {
                $v = 'ASC';
            }
            $neworder[] = "`$k` $v";
        }

        if (!empty($neworder)) {
            return ' ORDER BY ' . implode(' , ', $neworder);
        }
        return '';
    }

    protected function _filter($info) {
        return array_intersect_key($info, $this->_cols);
    }

}
