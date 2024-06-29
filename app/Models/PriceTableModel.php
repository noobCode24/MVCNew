<?php

class PriceTableModel extends Model
{
    public function __construct()
    {
    }

    public function getAllService()
    {
        $data = $this->Select("SELECT * FROM service");
        return $data;
    }

    public function getAllServiceWidthCondition($id)
    {
        $data = $this->Select("SELECT * FROM service WHERE serviceCate_id = $id");
        return $data;
    }

    public function addService($path)
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d H:i:s');
        $filterAll['updated_at'] = null;
        $filterAll['service_img'] = $path;
        $addStatus = $this->Insert('service', $filterAll);
        if ($addStatus) return true;
        return false;
    }

    public function getService($id)
    {
        $data = $this->Select("SELECT * FROM service WHERE service_id = $id");
        return $data;
    }
    public function deleteService($id)
    {
        $condition = 'service_id  = ' . $id;
        $deleteStatus = $this->Delete('service', $condition);
        if ($deleteStatus) return true;
        return false;
    }

    public function updateService($id, $path)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d H:i:s');
        if (!empty($path)) {
            $filterAll['service_img'] = $path;
        }
        $condition = 'service_id = ' . $id;
        $updateStatus = $this->Update('service', $filterAll, $condition);
        if ($updateStatus) return true;
        return false;
    }
}
