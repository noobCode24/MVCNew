<?php

class Model
{
    public function __construct()
    {
        // echo 'model';
    }

    function ExecuteSql($sql, $data = [], $check = false)
    {
        global $conn;
        global $resultSql;
        // echo $sql . '<br>';     
        try {
            $statement = $conn->prepare($sql);
            if (!empty($data)) {
                $resultSql = $statement->execute($data);
            } else {
                $resultSql = $statement->execute();
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            echo 'File: ' . $e->getFile() . '<br>';
            echo 'Line' . $e->getLine() . '<br>';
            die();
        }
        // echo '<pre>';
        // print_r($statement);
        // echo '</pre>';
        if ($check)
            return $statement;
        return $resultSql;
    }

    function Insert($table, $data = [])
    {
        $keys = array_keys($data);
        $fields = implode(',', $keys);
        $values = ':' . implode(',:', $keys);

        $sql = 'INSERT INTO ' . $table . '(' . $fields . ') VALUES(' . $values . ')';

        $resultSql = $this->ExecuteSql($sql, $data); // bool
        return $resultSql;
    }

    function Update($table, $data = [], $condition = '')
    {
        $update = '';
        foreach ($data as $keys => $value) {
            $update .= $keys . ' = :' . $keys . ',';
        }
        $update = trim($update, ',');
        if (!empty($condition)) {
            $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $condition;
        } else {
            $sql = 'UPDATE ' . $table . ' SET ' . $update;
        }
        $resultSql = $this->ExecuteSql($sql, $data);
        return $resultSql;
    }

    function Delete($table, $condition = '')
    {
        if (!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        } else {
            $sql = 'DELETE FROM ' . $table;
        }
        $resultSql = $this->ExecuteSql($sql);
        return $resultSql;
    }

    function Select($sql, $data = [], $num_line = 2)
    {
        $res = $this->ExecuteSql($sql, $data, true);
        $dataFetch = '';
        if (is_object($res)) {
            if ($num_line == 1) {
                $dataFetch = $res->fetch(PDO::FETCH_ASSOC);
            } else {
                $dataFetch = $res->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $dataFetch;
    }

    function countLine($sql)
    {
        $res = $this->ExecuteSql($sql, [], true);
        $dataFetch = '';
        if (is_object($res)) {
            $dataFetch = $res->fetch(PDO::FETCH_ASSOC);
        }
        return $dataFetch['count(*)'];
    }
}
