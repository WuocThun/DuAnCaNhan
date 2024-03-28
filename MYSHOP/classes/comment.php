<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
// include_once '../lib/database.php';
// include_once '../helpers/format.php';
class comment
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function insert_comment($content, $customer_id, $product_id)
    {
        $content = mysqli_real_escape_string($this->db->link, $content);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $product_id = mysqli_real_escape_string($this->db->link, $product_id);
        if (empty($content)) {
            echo "don't miss up field";
        } else {
            $query = "INSERT INTO tbl_binhluan(content,customer_id,product_id) VALUES
        ('$content','$customer_id','$product_id')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Comment added</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Failed</span>";
                return $alert;
            }
        }
    }
    public function getCommentById($product_id)
    {
        $product_id = mysqli_real_escape_string($this->db->link, $product_id);

        $query = "SELECT * FROM tbl_binhluan where product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getAllComment()
    {

        $query = "SELECT * FROM tbl_binhluan order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function delComment($id)
    {

        $query = "DELETE  FROM tbl_binhluan where id = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
