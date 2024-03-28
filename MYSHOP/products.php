<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>All product</h3>
            </div>
            <div class="section group">
                <div class="clear"></div>

                <?php
            $getallPro = $pd->getAllProduct();
            ?>
                <?php

            if ($getallPro) {
                while ($result = $getallPro->fetch_assoc()) {

            ?>

                <div class="grid_1_of_4 images_1_of_4">
                    <a href="details.php?proId=<?php echo $result['productId'] ?>"><img width="100px" height="100px"
                            src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                    <h2>
                        <?php
                            echo $fm->textShorten($result['productName'], 10)
                            ?>

                    </h2>
                    <p> <?php
                            echo $fm->textShorten($result['product_desc'], 20);
                            ?>
                    </p>
                    <p><span class="price">
                            <?php
                                echo $fm->format_currency($result['price'])
                                ?>
                            VNĐ
                        </span></p>
                    <div class="button">
                        <span><a href="details.php?proId=<?php echo $result['productId'] ?>"
                                class="details">Details</a></span>
                    </div>

                </div>
                <?php
                }
            }
            ?>
            </div>



        </div>
        <div class="content_bottom">
            <div class="heading">
                <center>
                    <h3>Thank you for luv me</h3>
                </center>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>
<?php
include 'inc/footer.php';

?>