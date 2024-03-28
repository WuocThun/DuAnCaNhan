<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/brand.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product1.php'; ?>
<?php include_once '../classes/banner.php'; ?>
<?php
$banner = new banner();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insert_image = $banner->insert_image($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm hình ảnh Banner</h2>
        <?php
        if (isset($insert_image)) {
            echo $insert_image;
        }
        ?>
        <div class="block">
            <form action="banner.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option value="0">Không hiển thị</option>
                                <option value="1">Hiển thị</option>
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
        <a style="color: red;" href="bannerlist.php">Danh sách</a>

    </div>
</div>
<!-- Load TinyMCE -->
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>