<?php

class NewsModel extends Model
{
    public function __construct()
    {
    }

    public function getAllNew()
    {
        $data = $this->Select("SELECT * FROM news");
        return $data;
    }

    public function getAllNewWithCondition($condition)
    {
        $data = $this->Select("SELECT * FROM news WHERE " . $condition);
        return $data;
    }

    public function getNewHome()
    {
        $data = $this->Select("SELECT * FROM news ORDER BY created_at DESC LIMIT 4");
        return $data;
    }

    public function getPrimaryNew()
    {
        $data = $this->Select("SELECT * FROM news WHERE new_type = 1");
        return $data;
    }

    public function countSecondaryNew()
    {
        $count = $this->countLine("SELECT count(*) FROM news WHERE new_type = 0");
        return $count;
    }

    public function getSecondaryNew($page = "")
    {
        if (empty(($page))) {
            $data = $this->Select("SELECT * FROM news WHERE new_type = 0");
        } else {
            $page = ($page - 1) * 9 - 1;
            if ($page < 0) $page = 0;
            $data = $this->Select("SELECT * FROM news WHERE new_type = 0 LIMIT 9 OFFSET $page");
        }
        return $data;
    }

    public function detailNew($id)
    {
        $sql = 'SELECT * from news WHERE  new_id = ' . $id;
        $detail = $this->Select($sql);
        return $detail;
    }


    public function addNew($path)
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d');
        $filterAll['updated_at'] = null;
        $filterAll['new_image'] = $path;
        if ($filterAll['new_type'] == '1') {
            $sql = "UPDATE news SET new_type = '0'";
            $this->ExecuteSql($sql);
        }
        $addStatus = $this->Insert('news', $filterAll);
        if ($addStatus) return true;
        return false;
    }

    public function checkTypeNew($id)
    {
        $sql = "SELECT new_type from news WHERE new_id = $id";
        return $this->Select($sql)[0]['new_type'];
    }

    public function deleteNew($id)
    {
        if ($this->checkTypeNew($id) == 1) {
            $sql = "SELECT *  FROM `news` WHERE created_at = (SELECT MAX(created_at) FROM news)";
            $new = $this->Select($sql);
            if (!empty($new)) {
                $idPriNew = $new[0]['new_id'];
                $sql = "UPDATE news SET new_type = 1 WHERE new_id = $idPriNew";
                $this->ExecuteSql($sql);
            }
        }
        $condition = 'new_id = ' . $id;
        $deleteStatus = $this->Delete('news', $condition);
        if ($deleteStatus) return true;
        return false;
    }

    public function updateNew($id, $path)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        if (!empty($path)) {
            $filterAll['new_image'] = $path;
        }
        $condition = 'new_id = ' . $id;
        if ($filterAll['new_type'] == '1') {
            $sql = "UPDATE news SET new_type = '0'";
            $this->ExecuteSql($sql);
        }
        $updateStatus = $this->Update('news', $filterAll, $condition);
        if ($updateStatus) return true;
        return false;
    }
}
