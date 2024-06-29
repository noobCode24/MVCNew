<?php

class EnterServicesModel extends Model{
    public function __construct(){
        // echo "enterservice model";
    }

    public function getAllEnterServices() {
        $data = $this->Select("SELECT * FROM enterservice");
        return $data;
    }

    public function getAllEnterServicesWithCondition($condition) {
        $data = $this->Select("SELECT * FROM enterservice WHERE ". $condition);
        return $data;
    }

    public function getEnterServices($id) {
        $data = $this->Select("SELECT * FROM enterservice WHERE enterservice_id = ". $id);
        return $data;
    }

    public function addEnterServices() {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d H:i:S');
        $filterAll['updated_at'] = null;
        $addStatus = $this->Insert('enterservice',$filterAll);
        if($addStatus) return true;
        return false;
    }

    public function deleteEnterServices($id) {
        $condition = 'enterservice_id = ' . $id;
        $deleteStatus = $this->Delete('enterservice', $condition);
        if($deleteStatus) return true;
        return false;
    }

    public function updateEnterServices($id) {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y-m-d H:i:s');
        $condition = 'enterservice_id = ' . $id;
        $updateStatus = $this->Update('enterservice', $filterAll ,$condition);
        if($updateStatus) return true;
        return false;
    }
}