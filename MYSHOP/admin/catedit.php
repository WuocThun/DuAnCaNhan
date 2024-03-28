<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include '../classes/category.php';
?>
<?php
$cat = new category();
if (!isset($_GET['catid']) || $_GET['catid'] == null) {
    echo " <script>'window.location = 'catlist.php'; </script>";
} else {
    $id = $_GET['catid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CatName = $_POST['CatName'];
    $update_Cat = $cat->update_category($CatName, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>
        <?php
        if (isset($update_Cat)) {
            echo $update_Cat;
        }
        ?>
        <?php
        $get_cate_name = $cat->getcatbyId($id);
        if ($get_cate_name) {
            while ($result  = $get_cate_name->fetch_assoc()) {
        ?>
        <div class="block copyblock">
            <form action="" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Sửa danh mục " name="CatName" class="medium"
                                value=" <?php echo $result['catName'] ?> " />
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