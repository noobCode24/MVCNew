<?php

class StatisticsModel extends Model
{
    public function __construct()
    {
    }

    public function getAllRevenue($condition = '')
    {
        $sql = "SELECT * FROM booking WHERE payment_status = 1 AND date_of_use >= '2024-01-01'";
        if (!empty($condition)) {
            $sql = "SELECT * FROM booking WHERE payment_status = 1";
            $sql .= ' AND ' . $condition;
        }
        $sql .= " ORDER BY date_of_use";
        $data = $this->Select($sql);
        return $data;
    }

    public function getTypeBill($condition = '')
    {
        $sql = "SELECT bd.ticket_id, COUNT(*) AS count, t.ticket_name,t.price
                FROM booking_detail bd INNER JOIN ticket t ON t.ticket_id = bd.ticket_id 
                INNER JOIN booking b ON b.booking_id = bd.booking_id
                WHERE b.date_of_use >= '2024-01-01' 
                GROUP BY ticket_id 
                ";
        if (!empty($condition)) {
            $sql = "SELECT bd.ticket_id, COUNT(*) AS count, t.ticket_name,t.price 
                FROM booking_detail bd INNER JOIN ticket t ON t.ticket_id = bd.ticket_id 
                INNER JOIN booking b ON b.booking_id = bd.booking_id 
                WHERE $condition
                GROUP BY ticket_id ";
        }
        $data = $this->Select($sql);
        return $data;
    }

    public function statisticByYear($condition = '')
    {   
        $sql = "SELECT * FROM booking WHERE payment_status = 1";
        if (!empty($condition)) {
            $sql = "SELECT * FROM booking WHERE payment_status = 1";
            $sql .= ' AND ' . $condition;
        }
        $sql .= " ORDER BY date_of_use";
        // echo $sql;
        $data = $this->Select($sql);
        return $data;
    }
}
