<?php
class TicketsModel extends Model
{
    public function __construct()
    {

    }

    public function getAllTypeTicket()
    {
        $data = $this->Select("SELECT * FROM tickets_types");
        return $data;
    }

    public function addTypeTicket($path)
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d H:i:s');
        $filterAll['updated_at'] = null;
        $filterAll['ticket_icon'] = $path;
        $addStatus = $this->Insert('tickets_types', $filterAll);
        if ($addStatus)
            return true;
        return false;
    }

    public function getTypeTicket($id)
    {
        $data = $this->Select("SELECT * FROM tickets_types WHERE ticket_type_id = $id");
        return $data;
    }

    public function updateTicket($id, $path)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d H:i:s');
        if (!empty($path)) {
            $filterAll['ticket_icon'] = $path;
        }
        $condition = 'ticket_type_id = ' . $id;
        $updateStatus = $this->Update('tickets_types', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }

    public function deletTypeTicket($id)
    {
        $condition = 'ticket_type_id = ' . $id;
        $deleteStatus = $this->Delete('tickets_types', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
}

?>