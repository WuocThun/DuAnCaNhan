<?php
include 'inc/header.php';
// include 'inc/slider.php';
if (!isset($_GET['catId']) || $_GET['catId'] == null) {
    echo " <script>'window.location = '404.php' </script>";
} else {
    $id = $_GET['catId'];
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $updateProduct = $pd->update_product($_POST, $_FILES, $id);
// }
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <?php
                $cat_name = $ct->get_catName($id);
                if ($cat_name) {
                    while ($Name_cat = $cat_name->fetch_assoc()) {

                ?>
                        <h3>Category: <?php echo $Name_cat['catName'] ?></h3>
                <?php
                    }
                } else {
                    echo "Hiện chưa có sản phẩm";
                }
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $getProductByCat = $ct->get_Product_By_Cat($id);
            if ($getProductByCat) {
                while ($resulyCat = $getProductByCat->fetch_assoc()) {


            ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?proId=<?php echo $resulyCat['productId'] ?>"><img src="admin/uploads/<?php echo $resulyCat['image'] ?>" alt="" /></a>
                        <h2> <?php
                                echo $resulyCat['productName'];
                                ?> </h2>
                        <p><?php
                            echo $resulyCat['product_desc'];
                            ?></p>
                        <p><span class="price"><?php
                                                echo $resulyCat['price'] . " VNĐ";
                                                ?></span></p>
                        <div class="button"><span><a href="details.php?proId=<?php echo $resulyCat['productId'] ?>" class="details">Details</a></span></div>
                    </div>
            <?php
                }
            }
            ?>
        </div>



    </div>
</div>
<?php
include 'inc/footer.php';

?>