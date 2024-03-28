<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
// include_once '../lib/database.php';
// include_once '../helpers/format.php';
class banner
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function insert_image($data, $file)
    {
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image =  substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        $image = $unique_image;
        if (
            $file_name = ""
        ) {
            $alert = "Không được để trống các trường";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_banner(image,type) VALUES
             ('$image','$type')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Thêm banner thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Thêm banner ko thành công</span>";
                return $alert;
            }
        }
    }
    public function getAllImage()
    {
        $querry  = "select * from tbl_banner where type = '1' order by id desc limit 0,4 ";
        $result = $this->db->select($querry);
        return $result;
    }
    public function getAllBanner()
    {
        $querry  = "select * from tbl_banner order by id desc ";
        $result = $this->db->select($querry);
        return $result;
    }
    public function turnOnBanner($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_banner
        SET type = '1'
         WHERE id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Update succesfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Failed</span>";
            return $alert;
        }
    }
    public function turnOffBaner($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_banner
        SET type = '0'
         WHERE id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Update succesfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Failed</span>";
            return $alert;
        }
    }
    public function delBanner($id)
    {
        $query = "DELETE FROM tbl_banner WHERE id = '$id'  ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Xoá thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Xoá không thành công</span>";
            return $alert;
        }
    }
}
