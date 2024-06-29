<?php
class EmployeeModel extends Model
{
    public function __construct()
    {
    }

    public function getAllEmployee($condition)
    {
        $sql = "SELECT * FROM employee";
        if(!empty($condition)) $sql = "SELECT * FROM employee WHERE $condition";
        $data = $this->Select($sql);
        return $data;
    }

    public function addEmployee($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $addStatus = $this->Insert('employee', $data);
        if ($addStatus)
            return true;
        return false;
    }

    public function deleteEmployee($id)
    {
        $condition = 'id = ' . $id;
        $deleteStatus = $this->Delete('employee', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
    public function detailEmployee($id)
    {
        $sql = 'SELECT * from employee WHERE  id = ' . $id;
        $detail = $this->Select($sql);
        return $detail;
    }

    public function updateEmployee($id)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = 'id = ' . $id;
        $updateStatus = $this->Update('employee', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }
}
