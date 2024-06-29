<?php
class TicketsModel extends Model
{
    public function __construct()
    {
    }

    public function getAllTypeTicket()
    {
        $data = $this->Select("SELECT * FROM ticket");
        return $data;
    }

    public function addTypeTicket($path)
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d H:i:s');
        $filterAll['updated_at'] = null;
        $filterAll['ticket_icon'] = $path;
        $addStatus = $this->Insert('ticket', $filterAll);
        if ($addStatus)
            return true;
        return false;
    }

    public function getTypeTicket($id)
    {
        $data = $this->Select("SELECT * FROM ticket WHERE ticket_id = $id");
        return $data;
    }

    public function updateTicket($id, $path)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d H:i:s');
        if (!empty($path)) {
            $filterAll['ticket_icon'] = $path;
        }
        $condition = 'ticket_id = ' . $id;
        $updateStatus = $this->Update('ticket', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }

    public function deletTypeTicket($id)
    {
        $condition = 'ticket_id = ' . $id;
        $deleteStatus = $this->Delete('ticket', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
}
