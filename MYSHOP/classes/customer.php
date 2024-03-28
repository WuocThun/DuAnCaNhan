<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
// include_once '../lib/database.php';
// include_once '../helpers/format.php';
class customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function insert_customer($data)
    {
        $name1 = mysqli_real_escape_string($this->db->link, $data['cusName']);
        $city1 = mysqli_real_escape_string($this->db->link, $data['cusCity']);
        $cusCon1 = mysqli_real_escape_string($this->db->link, $data['cusCon']);
        $zipcode1 = mysqli_real_escape_string($this->db->link, $data['cusZip']);
        $email1 = mysqli_real_escape_string($this->db->link, $data['cusEmail']);
        $address1 = mysqli_real_escape_string($this->db->link, $data['cusAdd']);
        $phone1 = mysqli_real_escape_string($this->db->link, $data['cusPhone']);
        $password1 = mysqli_real_escape_string($this->db->link, md5($data['cusPass']));
        if (false) {
            $alert = "<span>Không được để trống.</span>";
            return $alert;
        } else {
            $check_mail = "SELECT * FROM tbl_customer WHERE cusEmail = '$email1' LIMIT 1";
            $result_checkMail = $this->db->select($check_mail);
            if ($result_checkMail) {
                $alert = "<span>Email đã tồn tại</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(cusName,cusCon,cusAdd,cusCity,cusZip,cusPhone,cusEmail,cusPass) VALUES
                ('$name1','$cusCon1','$address1','$city1','$zipcode1','$phone1','$email1','$password1')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'> Đăng ký thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Đăng ký thất bại, vui lòng thử lại.</span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customer($data)
    {
        $email1 = mysqli_real_escape_string($this->db->link, $data['email']);
        $password1 = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if (empty($email1) || empty($password1)) {
            $alert = "<span>Email hoặc Mật khẩu không được để trống.</span>";
            return $alert;
        } else {
            $check_mail = "SELECT * FROM tbl_customer WHERE cusEmail = '$email1' AND cusPass = '$password1' LIMIT 1";
            $result_checkMail = $this->db->select($check_mail);
            if ($result_checkMail != false) {
                $value = $result_checkMail->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['cusId']);
                Session::set('customer_name', $value['cusEmail']);
                header("location: order.php");
            } else {
                $alert = "<span>Mật khẩu hoặc tài khoản không đúng</span>";
                return $alert;
            }
        }
    }
    public function show_customers($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE cusId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_cus($data, $id)
    {
        $name1 = mysqli_real_escape_string($this->db->link, $data['cusName']);
        $email1 = mysqli_real_escape_string($this->db->link, $data['cusEmail']);
        $phone1 = mysqli_real_escape_string($this->db->link, $data['cusPhone']);
        if (false) {
            $alert = "<span>Không được để trống.</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_customer SET cusName='$name1' ,cusEmail = '$email1', cusPhone= '$phone1' WHERE cusId = '$id' ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Cập nhật thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Cập nhật không thành công  </span>";
                return $alert;
            }
        }
    }
}
