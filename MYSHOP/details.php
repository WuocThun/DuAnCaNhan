<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (!isset($_GET['proId']) || $_GET['proId'] == null) {
    echo " <script>'window.location = '404.php'; </script>";
} else {
    $id = $_GET['proId'];
    $customer_id = Session::get('customer_id');

    if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['compare'])) {
        $customer_id = Session::get('customer_id');
        $productId = $_POST['productId'];
        $insert_compare =  $pd->insert_compare($productId, $customer_id);
    }
}
if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
    $quanlity = $_POST['quanlity'];
    $addToCart =  $cart->addToCart($quanlity, $id);
}
if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['comment'])) {
    $customer_id = Session::get('customer_id');
    $product_id = $_GET['proId'];
    $content = $_POST['content'];
    $insert_comment =  $comment->insert_comment($content, $customer_id, $product_id);
}

?>
<div class="main">
    <div class="content">
        <div class="section group">
            <?php

            $get_products_details = $pd->get_details($id);
            if ($get_products_details) {
                while ($result_details = $get_products_details->fetch_assoc()) {

            ?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php
                                echo $result_details['productName']
                                ?></h2>

                    <div class="price">
                        <p>Price: <span><?php
                                                echo $fm->format_currency($result_details['price'])
                                                ?> VNĐ</span></p>
                        <p>Category: <span><?php
                                                    echo $result_details['catName']
                                                    ?></span></p>
                        <p>Brand:<span><?php
                                                echo $result_details['brandName']
                                                ?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <?php
                                    $login_check = Session::get('customer_login');
                                    if ($login_check == false) {
                                        echo '
                            <a href="login.php" > Buy now <br></a>
                                        ';
                                    } else {
                                        echo '
                            <input type="number" class="buyfield" name="quanlity" value="1" min="1" />

                        <input type="submit" class="buysubmit" name="submit" value="Buy Now" /> <br>

                        ';
                                    }

                                    ?>
                            <?php
                                    if (isset($addToCart)) {
                                        echo $addToCart;
                                    }
                                    ?>
                        </form>
                    </div>
                    <div class="add-cart">
                        <form action="" method="POST">

                            <!-- <a href="?Wlist=<?php echo $result_details['productId'] ?>" class="buysubmit">Save to
                                Wishlist</a>
                            <a href="?compare=<?php echo $result_details['productId'] ?>" class="buysubmit">Compare
                                product</a> -->
                            <input type="hidden" class="buysubmit" name="productId"
                                value="<?php echo $result_details['productId'] ?>" /> <br>
                            <?php
                                    $login_check = Session::get('customer_login');
                                    if ($login_check == false) {
                                        echo '';
                                    } else {
                                        echo '
                        <input type="submit" class="buysubmit" name="compare" value="Add to favorite" />' . '
                        ';
                                        // <input type="submit" class="buysubmit" name="compare" value="Compare Product" /> 
                                    }


                                    ?>
                        </form>
                        <?php
                                if (isset($insert_compare)) {
                                    echo $insert_compare;
                                }
                                ?>
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Product Details</h2>
                    <p><?php
                                echo $result_details['product_desc']
                                ?>.</p>
                </div>
            </div>

            <?php
                }
            } else {
            }
            ?>
            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIES</h2>
                <ul>

                    <?php
                    $getAllCat =  $ct->show_category();
                    if ($getAllCat) {
                        while ($resultAllCat = $getAllCat->fetch_assoc()) {


                    ?>
                    <li><a href="productbycat.php?catId=<?php echo $resultAllCat['catId'] ?> "><?php
                                                                                                        echo $resultAllCat['catName']
                                                                                                        ?></a></li>
                    <?php
                        }
                    }

                    ?>
                </ul>

            </div>

        </div>
        <div class="binhluan">
            <div class="row">
                <div class="col-md-8">
                    <h5>Comment here </h5>
                    <?php
                    if (isset($insert_comment)) {
                        echo $insert_comment;
                    }
                    ?>
                    <form method="POST" action="">
                        <p><textarea class="form-control" placeholder="Comment here...." name="content"></textarea></p>

                        <p><input type="submit" name="comment" value="Send Comment" class="btn btn-success"></p>
                    </form>
                </div>

            </div>
        </div>
        <table class="tblone">
            <tr>
                <th width="5%">STT</th>
                <th width="10%">Tên</th>
                <th width="50%">Nội dung</th>
            </tr>
            <?php
            $product_id = $_GET['proId'];
            $getAllcomment = $comment->getCommentById($product_id);
            if ($getAllcomment) {
                $i = 0;
                while ($result_comment  = $getAllcomment->fetch_assoc()) {
                    $i++;

            ?>
            <tr>
                <td><?php
                            echo $i;
                            ?></td>
                <td><?php
                            echo $result_comment['customer_id'];
                            ?></td>
                <td><?php
                            echo $result_comment['content'];
                            ?></td>

            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>
<?php
include 'inc/footer.php';

?>