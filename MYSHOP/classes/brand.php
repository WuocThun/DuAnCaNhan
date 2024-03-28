<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

// include_once '../lib/database.php';
// include_once '../helpers/format.php';
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function insert_brand($brandName)
    {
        //hàm kiểm tra hơp lệ hay không
        $brandName = $this->fm->validate($brandName);
        //dùng 2 cái user,pass để kết nối với cơ sở dữ liệu
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if (empty($brandName)) {
            $alert = "Danh mục không được để trống";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName') ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Thêm danh mục thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Thêm danh không mục thành công</span>";
                return $alert;
            }
        }
    }
    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand order by brandId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyId($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id'  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($BrandName, $id)
    {
        $BrandName = $this->fm->validate($BrandName);
        $BrandName = $this->fm->validate($BrandName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($BrandName)) {
            $alert = "Danh mục không được để trống";
            return $alert;
        } else {
            $query = "UPDATE tbl_brand SET brandName = '$BrandName' WHERE brandId = '$id' ";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'> Cập nhật danh mục thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Cập nhật  danh không mục thành công</span>";
                return $alert;
            }
        }
    }
    public function del_brand($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brandId  = '$id'  ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Xoá danh mục thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Xoá  danh không mục thành công</span>";
            return $alert;
        }
    }
}
