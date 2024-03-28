<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
// include_once '../lib/database.php';
// include_once '../helpers/format.php';

class product1
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db =  new Database();
        $this->fm =  new Format();
    }
    public function
    insert_product($data, $files)
    {
        $productName1 = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category1 = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brand1 = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $product_desc1 = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price1 = mysqli_real_escape_string($this->db->link, $data['price']);
        $type1 = mysqli_real_escape_string($this->db->link, $data['type']);
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image =  substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        $image = $unique_image;
        $intvalBrand = intval($brand1);
        $intvalCat = intval($category1);
        $intvalType = intval($type1);

        if (
            $file_name = ""
        ) {
            $alert = "Không được để trống các trường";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,catId,brandId,product_desc,type,price,image) VALUES
             ('$productName1','$category1','$brand1','$product_desc1','$type1','$price1','$image')";

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
    // public function show_product()
    // {
    //     $query = "SELECT * FROM tbl_product order by productId desc ";
    //     $result = $this->db->select($query);
    //     return $result;
    // }
    public function show_product1()
    {
        $query = "SELECT tbl_product.* ,tbl_category.catName, tbl_brand.brandName 
        
        from tbl_product INNER JOIN tbl_category on tbl_product.catId = tbl_category.catId  
INNER JOIN tbl_brand on tbl_product.brandId = tbl_brand.brandId
order by tbl_product.productId desc
         ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data, $files, $id)
    {
        $productName1 = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category1 = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brand1 = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $product_desc1 = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price1 = mysqli_real_escape_string($this->db->link, $data['price']);
        $type1 = mysqli_real_escape_string($this->db->link, $data['type']);
        $file_name = $_FILES['image']['name'];
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image =  substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        $image = $unique_image;
        $intvalBrand = intval($brand1);
        $intvalCat = intval($category1);
        $intvalType = intval($type1);
        $whiteProName  = "[" . trim($productName1) . "]";

        if (
            $file_name = ""
        ) {
            $alert = "Không được để trống các trường";
            return $alert;
        } else {
            if (!empty($file_name)) {
                //nếu ng dùng chọn ảnh
                if ($file_size > 2048) {
                    $alert =  "<span class='error'>ảnh phải nhỏ hơn 2b</span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) === false) {
                    $alert =  "<span class='error'>bạn có thể up các file jpg,...
                         </span>";
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName1',
                    brandId = '$brand1',
                    catId = '$category1',
                    type = '$type1',
                    price = '$price1',
                    image = '$unique_image',
                    product_desc = '$product_desc1'
                     WHERE productId = '$id' ";
                    return $alert;
                }
            } else {
                $query = "UPDATE tbl_product SET 
                    productName = '$productName1',
                    brandId = '$brand1',
                    catId = '$category1',
                    type = '$type1',
                    price = '$price1',
                    product_desc = '$product_desc1'
                     WHERE productId = '$id' ";
            }
        }

        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Cập nhật sản phẩm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Cập nhật  sản phẩm không thành công</span>";
            return $alert;
        }
    }
    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId = '$id'  ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Xoá danh mục thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Xoá  danh không mục thành công</span>";
            return $alert;
        }
    }
    public function getProduct_feathered()
    {
        $query = "SELECT * FROM tbl_product WHERE type = '0' order by productId desc limit 3,4    ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProduct_new()
    {
        $query = "SELECT * FROM tbl_product order by productId desc limit 4  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id)
    {
        $query = "SELECT tbl_product.* ,tbl_category.catName, tbl_brand.brandName 
        
        from tbl_product INNER JOIN tbl_category on tbl_product.catId = tbl_category.catId  
INNER JOIN tbl_brand on tbl_product.brandId = tbl_brand.brandId
where tbl_product.productId = '$id' ";

        $result = $this->db->select($query);
        return $result;
    }
    public function getLatestLapTop()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '7' ORDER BY productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLatestIphone()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLatestIpad()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '5' ORDER BY productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLatestWatch()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '6' ORDER BY productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_compare($productId, $customer_id)
    {
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        // lấy giá trị của cart 
        $query = "SELECT * FROM tbl_product WHERE productId = '$productId' ";
        $result = $this->db->select($query)->fetch_assoc();
        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];
        $check_compare = "SELECT * FROM tbl_compare WHERE product_id = '$productId' AND customer_id = '$customer_id'";
        $result_check_compare = $this->db->select($check_compare);
        if ($result_check_compare) {
            $msg = "The product alredy added in to favorite";
            return $msg;
        } else {
            $query_insert = "INSERT INTO tbl_compare(product_id,price,image,customer_id,productName)
         VALUES 
         ('$productId','$price','$image','$customer_id','$productName') ";
            $inser_compare  = $this->db->insert($query_insert);
            if ($inser_compare) {
                $alert = "<span class='success'> add to favorite susscefully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> something errors </span>";
                return $alert;
            }
        }
    }
    public function getCompare($customerId)
    {
        $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customerId' ORDER BY id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_Compare($id)
    {
        $query = "DELETE FROM tbl_compare WHERE product_Id = '$id'  ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Xoá  thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Xoá không mục thành công</span>";
            return $alert;
        }
    }
    public function getAllProduct()
    {
        $query = "SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }
}
