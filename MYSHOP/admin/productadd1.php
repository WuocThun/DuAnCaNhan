<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/brand.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product1.php'; ?>
<?php
$pd = new product1();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // $productName = $_POST['productName'];
    // $category = $_POST['catId'];
    // $brand = $_POST['brandId'];
    // $product_desc =  $_POST['product_desc'];
    // $price = $_POST['price'];
    // $type = $_POST['type'];
    // $file_name = $_FILES['image']['name'];
    // $file_size = $_FILES['image']['size'];
    // $file_temp = $_FILES['image']['tmp_name'];

    // $div = explode('.', $file_name);
    // $file_ext = strtolower(end($div));
    // $unique_image =  substr(md5(time()), 0, 10) . '.' . $file_ext;
    // $uploaded_image = "uploads/" . $unique_image;
    // $image = $unique_image;
    // $insert_product1 = $pd->insert_product($productName, $category, $brand, $product_desc, $price, $type, $image);
    $insert_product1 = $pd->insert_product($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <?php
        if (isset($insert_product1)) {
            echo $insert_product1;
        }
        ?>
        <div class="block">
            <form action="productadd1.php" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId">
                                <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if ($catlist) {
                                    while ($result  = $catlist->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $result['catId'] ?>"><?php
                                                                                        echo $result['catName']
                                                                                        ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>

                            <select id="select" name="brandId">
                                <?php
                                $brand = new brand();
                                $showbrand = $brand->show_brand();
                                if ($showbrand) {
                                    while ($result = $showbrand->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['brandId'] ?> "><?php
                                                                                            echo $result['brandName']
                                                                                            ?></option>
                                <?php

                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="product_desc" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option value="1">Không hiển thị</option>
                                <option value="0">Hiển thị</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <a style="color: red;" href="productlist.php">Danh sách</a>

    </div>
</div>
<!-- Load TinyMCE -->
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>