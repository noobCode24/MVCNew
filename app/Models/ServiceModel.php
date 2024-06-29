<?php

class ServiceModel extends Model
{
    public function __construct()
    {

    }

    public function getAllServiceCate()
    {
        $data = $this->Select("SELECT * FROM service_category");
        return $data;
    }
    
    public function addCateService($path)
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d H:i:s');
        $filterAll['updated_at'] = null;
        $filterAll['serviceCate_icon'] = $path;
        $addStatus = $this->Insert('service_category', $filterAll);
        if ($addStatus) return true;
        return false;
    }

    public function getCateService($id) {
        $data = $this->Select("SELECT * FROM service_category WHERE serviceCate_id = $id");
        return $data;
    }

    
    

    // public function deleteNew($id)
    // {
    //     if($this->checkTypeNew($id) == 1) {
    //         $sql = "SELECT *  FROM `news` WHERE created_at = (SELECT MAX(created_at) FROM news)";
    //         $new = $this->Select($sql);
    //         if(!empty($new)){
    //             $idPriNew = $new[0]['new_id'];
    //             $sql = "UPDATE news SET new_type = 1 WHERE new_id = $idPriNew";
    //             $this->ExecuteSql($sql);
    //         }
    //     }
    //     $condition = 'new_id = ' . $id;
    //     $deleteStatus = $this->Delete('news', $condition);
    //     if ($deleteStatus) return true;
    //     return false;
    // }

    public function updateServiceCate($id, $path)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d H:i:s');
        if (!empty($path)) {
            $filterAll['serviceCate_icon'] = $path;
        }
        $condition = 'serviceCate_id = ' . $id;
        $updateStatus = $this->Update('service_category', $filterAll, $condition);
        if ($updateStatus) return true;
        return false;
    }

    public function deleteServiceCate($id) {
        $deleteStatus =  $this->Delete('service_category',"serviceCate_id = '$id'");
        if($deleteStatus) return true;
        return false;
    }
}
