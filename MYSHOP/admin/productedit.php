<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/brand.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product1.php'; ?>
<?php
$pd = new product1();
if (!isset($_GET['proId']) || $_GET['proId'] == null) {
    echo " <script>'window.location = 'productlist.php'; </script>";
} else {
    $id = $_GET['proId'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->update_product($_POST, $_FILES, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <?php
        if (isset($updateProduct)) {
            echo $updateProduct;
        }

        $get_product_id = $pd->getProductById($id);
        if ($get_product_id) {
            while ($reuslt_product = $get_product_id->fetch_assoc()) {

        ?>

        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" value="
                                    <?php echo $reuslt_product['productName'] ?>
                                    " class="medium" />
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
                                <option <?php
                                                        if ($result['catId'] == $reuslt_product['catId']) {
                                                            echo 'selected ';
                                                        }
                                                        ?> value="<?php echo $result['catId'] ?>"><?php
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
                                <option <?php
                                                        if ($result['brandId'] == $reuslt_product['brandId']) {
                                                            echo 'selected ';
                                                        }
                                                        ?> value="<?php echo $result['brandId'] ?> "><?php
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
                            <textarea name="product_desc"
                                class="tinymce"><?php echo $reuslt_product['product_desc'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" value="
                                    <?php echo $reuslt_product['price'] ?>
                                    " placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img width="120" height="100" src="uploads/<?php echo $reuslt_product['image'] ?>" alt="">
                            <br>
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
                                <?php
                                        if ($reuslt_product['type'] == 1) {
                                        ?>

                                <option selected value="1">Không hiển thị</option>
                                <option value="0">Hiên thị</option>
                                <?php
                                        } else {
                                        ?>
                                <option value="1">Hiên thị</option>
                                <option selected value="0">Không hiển thị</option>
                                <?php

                                        }
                                        ?>
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
        <a href="productlist.php">Danh sách</a>

        <?php
            }
        }
        ?>
    </div>
</div>
<!-- Load TinyMCE -->
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>