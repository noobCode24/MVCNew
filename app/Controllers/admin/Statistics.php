<?php
// Admin
class Statistics extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('StatisticsModel');
        $navItem = [
            'Hóa đơn',
            "Thống kê"
        ];
        $navLink = [
            'BookTicketInfo',
            'Statistics'
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['sub_content'][''] = "";
        $this->data['activeStatistics'] = true;
    }
    public function index()
    {
        $condition = '';
        $conditionYear = '';
        $timeSearch = '';
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value))
                    continue;
                if (is_string($value)) {
                    if($key == 'dateStart') {
                        $condition .= 'date_of_use' . ">=" . "CAST('$value' AS DATE)" . " AND ";
                        $timeSearch .= "từ $value";
                    } else if($key == 'dateEnd'){
                        $condition .= 'date_of_use' . "<=" . "CAST('$value' AS DATE)" . " AND ";
                        $timeSearch .= " đến $value";
                    }
                    if($key == 'yearSta') {
                        $yearStart = "$value-01-01";
                        $yearEnd = "$value-12-31";
                        $conditionYear .= ' date_of_use >= ' .  "CAST('$yearStart' AS DATE)";
                        $conditionYear .= ' AND date_of_use <= ' . "CAST('$yearEnd' AS DATE)";
                    }
                } else if (is_numeric($value)) {
                    $condition .= $key . "<=" . $value . " AND ";
                }
            }
        }
        $condition = rtrim($condition, ' AND ');
        $condition = rtrim($condition, ' and ');
        // $conditionYear = rtrim($condition, ' AND ');
        // $conditionYear = rtrim($condition, ' and ');
        if(!empty($condition)) {
            setFlashData('old',$_POST);
        }
        $revenue = $this->model_home->getAllRevenue($condition);
        $this->data['sub_content']['revenue'] = $revenue;

        $this->data['sub_content']['timeSearch'] = $timeSearch;

        $typeTicketChar = $this->model_home->getTypeBill($condition);
        $this->data['sub_content']['typeTicketChar'] = $typeTicketChar;

        $revenueYear = $this->model_home->statisticByYear($conditionYear);
        $this->data['sub_content']['revenueYear'] = $revenueYear;

        $this->data['content'] = 'admin\financial\statistic\list';
        $this->data['title'] = 'Báo cáo, thống kê';
        $this->render('layouts/admin_layout', $this->data);
    }

    // // Add
    // public function getAddNew()
    // {
    //     $this->data['content'] = 'admin\news\add';
    //     $this->data['title'] = 'Thêm tin tức tin tức';
    //     $this->render('layouts/admin_layout', $this->data);
    // }

    // public function handelImage()
    // {
    //     $image = $_FILES['new_image'];
    //     if (!empty($image['name'])) {
    //         $extend = '.jpg';
    //         if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
    //         $fileName = time() . $extend;
    //         move_uploaded_file(
    //             $_FILES['new_image']['tmp_name'],
    //             'C:\xampp\htdocs\MVC\public\assets\admin\images\new_image\new-' . $fileName
    //         );
    //         $fileName = 'new-' . $fileName;
    //         return $fileName;
    //     }
    // }

    // public function postAddNew()
    // {
    //     $fileName = $this->handelImage();
    //     if ($this->model_home->addNew($fileName)) {
    //         $msg = 'Thêm tin tức thành công';
    //         $type_msg = 'success';
    //     } else {
    //         $msg = 'Thêm tin tức thất bại';
    //         $type_msg = 'danger';
    //     }
    //     setFlashData('msg', $msg);
    //     setFlashData('type_msg', $type_msg);
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // public function getIdNew()
    // {
    //     $url = $_SERVER['PATH_INFO'];
    //     $arr = explode("/", $url);
    //     $arr =  $arr[count($arr) - 1];
    //     $id = explode("=", $arr)[1];
    //     return $id;
    // }

    // // Edit
    // public function getEditNew()
    // {
    //     $id = $this->getIdNew();
    //     $detail = $this->model_home->detailNew($id);
    //     $this->data['sub_content']['detail'] = $detail[0];
    //     $this->data['title'] = 'Sửa tin tức tin tức';
    //     $this->data['content'] = 'admin\news\edit';
    //     $this->render('layouts\admin_layout', $this->data);
    // }

    // public function postEditNew()
    // {
    //     $id = $this->getIdNew();
    //     $fileName = $this->handelImage();
    //     if ($this->model_home->updateNew($id, $fileName)) {
    //         $msg = 'Cập nhật tin tức thành công';
    //         $type_msg = 'success';
    //     } else {
    //         $msg = 'Cập nhật tin tức thất bại';
    //         $type_msg = 'danger';
    //     }
    //     setFlashData('msg', $msg);
    //     setFlashData('type_msg', $type_msg);
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // // Delete
    // public function handleDeleteNew()
    // {
    //     $id = $this->getIdNew();
    //     if ($this->model_home->deleteNew($id)) {
    //         $msg = 'Xóa tin tức thành công';
    //         $type_msg = 'success';
    //     } else {
    //         $msg = 'Xóa tin tức thất bại';
    //         $type_msg = 'danger';
    //     }
    //     setFlashData('msg', $msg);
    //     setFlashData('type_msg', $type_msg);
    //     redirect($_SERVER['HTTP_REFERER']);
    // }
}