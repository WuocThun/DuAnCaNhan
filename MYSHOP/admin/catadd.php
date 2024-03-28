<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include '../classes/category.php';
?>
<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CatName = $_POST['CatName'];
    $insert_cat = $cat->insert_category($CatName);
}
?>
<style>
.error {
    color: red;
    font-size: 18px;
}

.success {
    color: red;
    font-size: 18px;
}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm danh mục</h2>
        <?php
        if (isset($insert_cat)) {
            echo $insert_cat;
        }
        ?>
        <div class="block copyblock">
            <form action="catadd.php" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Tên danh mục " name="CatName" class="medium" />
                        </td>
                    </tr>
                    <tr>
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