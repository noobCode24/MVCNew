<?php
class BookTicketInfoModel extends Model
{
    public function __construct()
    {
    }

    public function getAllBookTicketInfo()
    {
        $data = $this->Select(
            "SELECT 
                            u.name,
                            u.email,
                            u.phone,
                            b.booking_id,
                            b.booking_date,
                            b.date_of_use,
                            b.total_price,
                            b.payment_status
                            FROM users u
                            JOIN customers c ON u.user_id = c.user_id
                            JOIN booking b ON c.customer_id = b.customer_id"
        );
        return $data;
    }

    public function getAllBookTicketInfoWithCondition($condition)
    {
        $sql = "SELECT 
                u.name,
                u.email,
                u.phone,
                b.booking_id,
                b.booking_date,
                b.date_of_use,
                b.total_price,
                b.payment_status
                FROM users u
                JOIN customers c ON u.user_id = c.user_id
                JOIN booking b ON c.customer_id = b.customer_id
                WHERE " . $condition;
        $data = $this->Select($sql);
        return $data;
    }

    public function getAllBookTicketInfoWithDetails($id)
    {
        $sql = "SELECT   u.name,u.address,u.country,u.email,u.phone,u.id_number, c.customer_id, t.ticket_name, bd.quantity, 
                      bd.price, b.booking_date, b.date_of_use, b.payment_status, b.total_price, b.booking_id
                FROM booking b INNER JOIN
                     booking_detail bd ON b.booking_id = bd.booking_id INNER JOIN
                     customers c ON b.customer_id = c.customer_id INNER JOIN
                     ticket t ON bd.ticket_id = t.ticket_id INNER JOIN
                     users u ON c.user_id = u.user_id
                WHERE b.booking_id = $id";
        $data = $this->Select($sql);
        return $data;
    }

    public function deleteBookTicketInfo($id)
    {
        $condition = 'booking_id = ' . $id;
        $deleteStatus = $this->Delete('booking', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
}
