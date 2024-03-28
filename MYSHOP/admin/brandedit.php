<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include '../classes/brand.php';
?>
<?php
$brand = new brand();
if (!isset($_GET['editbrand']) || $_GET['editbrand'] == null) {
    echo " <script>'window.lobrandion = 'brandlist.php'; </script>";
} else {
    $id = $_GET['editbrand'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $BrandName = $_POST['brandName'];
    $update_ = $brand->update_brand($BrandName, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>
        <?php
        if (isset($update_brand)) {
            echo $update_brand;
        }
        ?>
        <?php
        $get_brand_name = $brand->getbrandbyId($id);
        if ($get_brand_name) {
            while ($result  = $get_brand_name->fetch_assoc()) {
        ?>
                <div class="block copyblock">
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" placeholder="Sửa danh mục " name="brandName" class="medium" value=" <?php echo $result['brandName'] ?> " />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Cập nhật" />
                                </td>
                            </tr>
                        </table>

                    </form>
            <?php
            }
        }
            ?>
                </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>