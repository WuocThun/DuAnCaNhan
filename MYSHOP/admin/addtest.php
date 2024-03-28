<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/brand.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php include_once '../classes/test.php'; ?>

<?php
$pd = new test();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $brandId = $_POST['brandId'];
    $catId = $_POST['catId'];
    $type = $_POST['type'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image =  substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "uploads/" . $unique_image;
    // $insert_cat = $pd->product_insert($productName, $catId, $brandId, $product_desc, $type, $price, $unique_image);
    $insert_test1 = $pd->insert_test1($productName);
}
?>
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">
            <?php
            if (isset($insertProduct)) {
                echo $insertProduct;
            }
            ?>
            <form action="addtest.php" method="POST" enctype="multipart/form-data">
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
                            <select name="catId" id="select">
                                <option>Select Category</option>
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
                                <option>Select Brand</option>
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
                                <option>Select Type</option>
                                <option value="1">Featured</option>
                                <option value="0">Non-Featured</option>
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
    </div>
</div>



<?php include 'inc/footer.php'; ?>