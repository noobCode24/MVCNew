<?php
class ParkModel extends Model
{
    public function __construct()
    {
    }

    public function getDataPark() {
        $sql = "SELECT * from enterservice_category";
        return $this->Select($sql);
    }
}
  