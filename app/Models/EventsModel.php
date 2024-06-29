<?php

class EventsModel extends Model{
    public function __construct(){
        // echo "events model";
    }

    public function getAllEvent() {
        $data = $this->Select("SELECT * FROM events");
        return $data;
    }

    public function getAllEventWithCondition($condition) {
        $data = $this->Select("SELECT * FROM events WHERE ". $condition);
        return $data;
    }

    public function detailEvent($id) {
        $sql = 'SELECT * from events WHERE  event_id = '. $id;
        $detail = $this->Select($sql);
        return $detail;
    }


    public function addEvent($path) {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d');
        $filterAll['updated_at'] = null;
        $filterAll['event_image'] = $path;
        $addStatus = $this->Insert('events',$filterAll);
        if($addStatus) return true;
        return false;
    }

    public function deleteEvent($id) {
        $condition = 'event_id = ' . $id;
        $deleteStatus = $this->Delete('events', $condition);
        if($deleteStatus) return true;
        return false;
    }

    public function updateEvent($id,$path) {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        if(!empty($path)) {
            $filterAll['event_image'] = $path;
        }
        $condition = 'event_id = ' . $id;
        if($filterAll['event_type'] == '1') {
            $sql = "UPDATE events SET event_type = '0'";
            $this->ExecuteSql($sql);
        }
        $updateStatus = $this->Update('events', $filterAll ,$condition);
        if($updateStatus) return true;
        return false;
    }
}