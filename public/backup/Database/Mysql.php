<?php

namespace SpaceMvc\Framework\Library\Database;

use SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder;
use SpaceMvc\Framework\Library\Database;

/**
 * Class Database
 * @package SpaceMvc\Framework
 */
class Mysql extends Database
{
    /** @var PDO $conn */
    protected $conn;

    /** @var string $hostname */
    protected string $hostname = 'localhost';

    /** @var string $username */
    protected string $username = 'software';

    /** @var string $password */
    protected string $password = 'software';

    /** @var string $database */
    protected string $database = 'space_mvc';

    /**
     * Mysql constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new \Exception($sql . "<br />" . $e->getMessage());
        }
    }

    /**
     * exec
     * @param $sql
     * @return mixed
     */
    public function exec($sql)
    {
        return $this->conn->exec($sql);
    }

    /**
     * filterValue
     * @param $value
     * @return mixed
     */
    public function filterValue($value)
    {
        return filter_var($value, FILTER_SANITIZE_ADD_SLASHES);
    }

    /**
     * find
     * @param $table
     * @param $id
     * @return mixed
     */
    public function find($table, $id)
    {
        $stmt = $this->conn->query('SELECT * FROM '.$table.' WHERE id = '.$id);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * fetchAll
     * @param $sql
     * @return array
     */
    public function fetchAll($sql)
    {
        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }


    /**
     * insert
     * @param string $table
     * @param array $data
     */
    public function insert($table = '', $data = [])
    {
        $query  = 'INSERT INTO ';
        $query .= $table.' ';

        $query .= '(';
        if(!empty($data)) {
            foreach($data as $key => $value) {
                $query .= $key.', ';
            }
        }
        $query = rtrim($query, ', ');
        $query .= ') VALUES (';
        if(!empty($data)) {
            foreach($data as $key => $value) {
                $query .= "'".$this->filterValue($value)."', ";
            }
        }
        $query = rtrim($query, ', ');
        $query .= ');';

        return $this->exec($query);
    }

    /**
     * update
     * @param string $table
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(string $table, int $id, array $data)
    {
        $query  = 'UPDATE ';
        $query .= $table.' ';

        $query .= 'SET ';
        if(!empty($data)) {
            foreach($data as $key => $value) {
                $value = $this->filterValue($value);
                $query .= $key."='".$value."', ";
            }
            $query = rtrim($query, ', ');
        }

        $query .= ' WHERE id='.$id;
        $query .= ' LIMIT 1';
        return $this->exec($query);
    }

    /**
     * delete
     * @param string $table
     * @param int $id
     * @return mixed
     */
    public function delete(string $table, int $id)
    {
        $query  = 'DELETE FROM ';
        $query .= $table.' ';
        $query .= ' WHERE id='.$id;
        $query .= ' LIMIT 1';
        return $this->exec($query);
    }
}
