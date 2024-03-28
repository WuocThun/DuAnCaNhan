<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

// include_once 'lib/database.php';
// include_once 'helpers/format.php';
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function insert_category($CatName)
    {
        //hàm kiểm tra hơp lệ hay không
        $CatName = $this->fm->validate($CatName);
        //dùng 2 cái user,pass để kết nối với cơ sở dữ liệu
        $CatName = mysqli_real_escape_string($this->db->link, $CatName);
        if (empty($CatName)) {
            $alert = "Danh mục không được để trống";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES ('$CatName') ";
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
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category order by catId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM tbl_category WHERE catId = '$id'  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_category($catName, $id)
    {
        $CatName = $this->fm->validate($catName);
        $CatName = $this->fm->validate($catName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($CatName)) {
            $alert = "Danh mục không được để trống";
            return $alert;
        } else {
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id' ";
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
    public function del_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE catId = '$id'  ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Xoá danh mục thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Xoá  danh không mục thành công</span>";
            return $alert;
        }
    }
    public function get_Product_By_Cat($id)
    {
        $query = "SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY catId DESC LIMIT 8 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_catName($id)
    {
        $query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category
         WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId = '$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function delAllDataCat()
    {
        $sId = session_id();
        $query = "DELETE  FROM tbl_cart WHERE sId = '$sId'  ";
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
