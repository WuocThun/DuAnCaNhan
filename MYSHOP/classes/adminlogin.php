<?php
include "../lib/session.php";
Session::checkLogin();
include '../lib/database.php';
include '../helpers/format.php';
class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function login_admin($adminUser, $adminPass)
    {
        //hàm kiểm tra hơp lệ hay không
        $adminUser = $this->fm->validate($adminUser);
        $adminPass = $this->fm->validate($adminPass);
        //dùng 2 cái user,pass để kết nối với cơ sở dữ liệu
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
        if (empty($adminPass) || empty($adminUser)) {
            $alert = "user and pass must be not empty";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' and adminPass = '$adminPass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                //$vaule hiện tại đang truy xuất tới CSDL tbl_admin theo mảng
                Session::set('adminlogin', true);
                Session::set('adminId', $value['adminid']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']);
                header('location:index.php');
            } else {
                $alert = "user and pass not match";
                return $alert;
            }
        }
    }
}
