<?php

class EnterCategoriesServiceModel extends Model{
    public function __construct(){

    }

    public function getAllEnterCategoriesService() {
        $data = $this->Select("SELECT * FROM enterservice_category");
        return $data;
    }

    public function getAllEnterCategoriesServiceWithCondition($condition) {
        $data = $this->Select("SELECT * FROM enterservice_category WHERE ". $condition);
        return $data;
    }

    public function getEnterCategoryService($id) {
        $data = $this->Select("SELECT * FROM enterservice_category WHERE escate_id = ". $id);
        return $data;
    }

    public function getNameEnterCategoryService($id) {
        $data = $this->Select("SELECT escate_name FROM enterservice_category WHERE escate_id = ". $id);
        return $data;
    }

    public function addEnterCategoryService($path) {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y-m-d');
        $filterAll['updated_at'] = null;
        $filterAll['escate_img'] = $path;
        $addStatus = $this->Insert('enterservice_category',$filterAll);
        if($addStatus) return true;
        return false;
    }

    public function deleteEnterCategoryService($id) {
        $condition = 'escate_id = ' . $id;
        $deleteStatus = $this->Delete('enterservice_category', $condition);
        if($deleteStatus) return true;
        return false;
    }

    public function updateEnterCategoryService($id, $path) {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y-m-d');
        if (!empty($path)) {
            $filterAll['escate_img'] = $path;
        }
        $condition = 'escate_id = ' . $id;
        $updateStatus = $this->Update('enterservice_category', $filterAll ,$condition);
        if($updateStatus) return true;
        return false;
    }
}