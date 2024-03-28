<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
            $getLatestLapTop = $pd->getLatestLapTop();
            if ($getLatestLapTop) {
                while ($resultLaptop = $getLatestLapTop->fetch_assoc()) {
            ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $resultLaptop['productId'] ?>">
                                <img src="admin/uploads/<?php echo $resultLaptop['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2><?php
                                echo $resultLaptop['productName']
                                ?></h2>
                            <p><?php
                                echo $fm->textShorten($resultLaptop['product_desc'], 30)
                                ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $resultLaptop['productId'] ?>">Add
                                        to cart</a></span></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <?php
            $getLatestIphone = $pd->getLatestIphone();
            if ($getLatestIphone) {
                while ($resultIphone = $getLatestIphone->fetch_assoc()) {
            ?>

                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $resultIphone['productId'] ?>"> <img src="admin/uploads/<?php echo $resultIphone['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2><?php
                                echo $resultIphone['productName']
                                ?></h2>
                            <p><?php
                                echo $fm->textShorten($resultIphone['product_desc'], 30)
                                ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $resultIphone['productId'] ?>">Add
                                        to cart</a></span></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="section group">
            <?php
            $getLatestIpad = $pd->getLatestIpad();
            if ($getLatestIpad) {
                while ($resultIpad = $getLatestIpad->fetch_assoc()) {
            ?>

                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $resultIpad['productId'] ?>"> <img src="admin/uploads/<?php echo $resultIpad['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2><?php
                                echo $resultIpad['productName']
                                ?></h2>
                            <p><?php
                                echo $fm->textShorten($resultIpad['product_desc'], 30)
                                ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $resultIpad['productId'] ?>">Add to
                                        cart</a></span></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <?php
            $getLatestWatch = $pd->getLatestWatch();
            if ($getLatestWatch) {
                while ($resultWatch = $getLatestWatch->fetch_assoc()) {
            ?>

                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?proId=<?php echo $resultWatch['productId'] ?>"> <img src="admin/uploads/<?php echo $resultWatch['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2><?php
                                echo $resultWatch['productName']
                                ?></h2>
                            <p><?php
                                echo $fm->textShorten($resultWatch['product_desc'], 30)
                                ?></p>
                            <div class="button"><span><a href="details.php?proId=<?php echo $resultWatch['productId'] ?>">Add to
                                        cart</a></span></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">

                    <?php
                    $getAllImage = $banner->getAllImage();
                    if ($getAllImage) {
                        while ($result_banner = $getAllImage->fetch_assoc()) {
                    ?>
                            <li><img width="100px" height="100px" src="admin/uploads/<?php echo $result_banner['image'] ?>" alt="" /></li>
                    <?php
                        }
                    }

                    ?>
                </ul>


            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>