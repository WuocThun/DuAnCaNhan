<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
// include_once '../lib/database.php';
// include_once '../helpers/format.php';
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function addToCart($quanlity, $id)
    {

        $quanlity = $this->fm->validate($quanlity);

        $quanlity = mysqli_real_escape_string($this->db->link, $quanlity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();
        //lấy giá trị của .product
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        $image = $result["image"];
        $price = $result["price"];
        $proName = $result["productName"];

        // lấy giá trị của cart 
        $checkCart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sid = '$sId'";
        $result_check = $this->db->select($checkCart);
        if ($result_check) {
            $msg = "Sản phẩm đã có sẵn trong giỏ hàng,";
            return $msg;
        } else {
            $query_insert = "INSERT INTO tbl_cart(productId,quanlity,sId,image,price,productName)
         VALUES 
         ('$id','$quanlity','$sId','$image','$price','$proName') ";
            $insert_cart  = $this->db->insert($query_insert);
            if ($insert_cart) {
                header('location:cart.php');
            } else {
                header('location: 404.php');
            }
        }
    }
    public function getProductCart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sID = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function
    update_Quanlity_cart($quanlity, $cartId)
    {
        $quanlity = mysqli_real_escape_string($this->db->link, $quanlity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE tbl_cart SET quanlity = '$quanlity' WHERE cartId = '$cartId' ";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Cập nhật số lượng sản phẩm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Cập nhật  số lượng sản phẩm không thành công</span>";
            return $alert;
        }
    }
    public function del_cart($id)
    {
        $cartId = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_cart WHERE cartId = '$cartId'  ";
        $result = $this->db->delete($query);
        if ($result) {
            header("location: cart.php");
            $alert = "<span class='success'> Xoá sản phẩm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Xoá  sản phẩm không thành công</span>";
            return $alert;
        }
    }
    public function check_Cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart where sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertOrder($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart where sId = '$sId'";
        $getProduct = $this->db->select($query);
        if ($getProduct) {
            while ($result = $getProduct->fetch_assoc()) {
                $productId = $result['productId'];
                $productName = $result['productName'];
                $quanlity = $result['quanlity'];
                $price = $result['price'] * $quanlity;
                $image = $result['image'];
                $customer_id = $customer_id;
                $query_order = "INSERT INTO tbl_order(productId,productName,customerId,quanlity,price,image)
                VALUES 
                  ('$productId','$productName','$customer_id','$quanlity','$price','$image') ";
                $insert_order  = $this->db->insert($query_order);
            }
        }
    }
    public function getAmount($customer_id)
    {
        $sId = session_id();
        $query = "SELECT price FROM tbl_order where customerId ='$customer_id'";
        $getPrice  = $this->db->select($query);
        return $getPrice;
    }
    public function getCartOrded($customer_id)
    {
        $query = "SELECT * FROM tbl_order where customerId ='$customer_id'";
        $getPrice  = $this->db->select($query);
        return $getPrice;
    }
    public function check_order($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_order where customerId ='$customer_id'";
        $getPrice  = $this->db->select($query);
        return $getPrice;
    }
    public function getInboxCart()
    {
        $query = "SELECT * FROM tbl_order order by dateOrder DESC";
        $getInbox  = $this->db->select($query);
        return $getInbox;
    }
    public function shift($id, $time, $price)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $query = "UPDATE tbl_order
         SET status = '1'
          WHERE orId = '$id' and dateOrder = '$time' and price = '$price' ";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Cập nhật thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Cập nhật không thành công</span>";
            return $alert;
        }
    }
    public function delShift($id, $time, $price)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $query = "UPDATE tbl_order
        SET status = '4'
         WHERE orId = '$id' and dateOrder = '$time' and price = '$price' ";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> xoá đơn hàng thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> xoá đơn hàng ko thành công</span>";
            return $alert;
        }
    }
    public function orderRecived($id, $time, $price)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $query = "UPDATE tbl_order
        SET status = '4'
         WHERE orId = '$id' and dateOrder = '$time' and price = '$price' ";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> xoá đơn hàng thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> xoá đơn hàng ko thành công</span>";
            return $alert;
        }
    }
}
