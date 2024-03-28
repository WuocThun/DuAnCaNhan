<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (isset($_GET['orId']) && $_GET['orId'] == 'order') {
    $customer_id = Session::get('customer_id');
    $inserOrder = $cart->insertOrder($customer_id);
    $delCart = $ct->delAllDataCat();
    header("Location: susscess.php");
}
if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
    $addToCart =  $cart->addToCart($quanlity, $id);
}
?>
<style>
    .submit_order {
        /* margin: 10px; */
        padding: 10px;
        border: none;
        /* background: ; */
        font-size: 25px;
        color: #666;
        border-radius: 5%;
    }

    .box_left {
        width: 50%;
        border: 1px solid #666;
        float: left;
        padding: 4px;
    }

    .box_right {
        width: 47%;
        border: 1px solid #666;
        float: right;
        padding: 4px;
    }
</style>
<form>
    <div class="main">
        <div class="content">
            <div class="section group">

                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">
                        <table class="tblone">
                            <?php
                            if (isset($del_cart)) {
                                echo $del_cart;
                            }
                            if (isset($update_Quanlity_cart)) {
                                echo $update_Quanlity_cart;
                            }
                            ?>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Product Name</th>
                                <th width="15%">Price</th>
                                <th width="25%">Quantity</th>
                                <th width="20%">Total Price</th>
                                <!-- <th width="10%">Action</th> -->
                            </tr>
                            <?php
                            $getProductCart = $cart->getProductCart();
                            if ($getProductCart) {
                                $qty = 0;
                                $i = 0;
                                $subtotal = 0;
                                while ($result = $getProductCart->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php
                                            echo $i;
                                            ?></td>
                                        <td><?php
                                            echo $result['productName']
                                            ?></td>
                                        <td><?php
                                            echo $result['price'] . " VNĐ"
                                            ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" min="1" max="10" />
                                                <!-- <input type="text" name="quanlity" value=" -->
                                                <?php echo $result['quanlity'] ?>
                                                <!-- " /> -->
                                                <!-- <input type="submit" name="submit" value="Update" /> -->
                                            </form>
                                        </td>
                                        <td> <?php
                                                $total = $result['price'] * $result['quanlity'];
                                                echo $total . " VNĐ";
                                                ?>

                                        </td>
                                        <!-- <td><a href="?cartId=<?php echo $result['cartId'] ?>">Xoá</a></td> -->
                                    </tr>

                            <?php
                                    $qty =  $qty + $result['quanlity'];
                                    $subtotal += $total;
                                }
                            }
                            ?>
                            <?php
                            $check_Cart = $cart->check_Cart();
                            if ($check_Cart) {

                            ?>
                        </table>
                        <table style="float:right;text-align:left;" width="40%">
                            <tr>
                                <th>Sub Total : </th>
                                <td><?php
                                    echo $subtotal . ' VNĐ';
                                    Session::set('sum', $subtotal);
                                    Session::set('qty', $qty);
                                    ?></td>
                            </tr>
                            <tr>
                                <th>VAT :
                                <td>5% (<?php
                                        echo $vat = $subtotal * 0.1 . "VNĐ";
                                        ?> </th>)</td>
                            </tr>
                            <tr>
                                <th>Grand Total :</th>
                                <td> <?php
                                        $vat = $subtotal * 0.1;
                                        $gtotal = $subtotal + $vat;
                                        echo $gtotal . ' VNĐ';
                                        ?> </td>
                            </tr>

                        </table>
                    <?php
                            } else {
                                echo "Giỏ hàng của bạn đang trống, hãy mua thêm";
                            }
                    ?>
                    </div>
                </div>
                <div class="box_right">
                    <table class="tblone">
                        <?php
                        $id = Session::get('customer_id');
                        $get_customers = $cus->show_customers($id);
                        if ($get_customers) {
                            while ($result = $get_customers->fetch_assoc()) {

                        ?>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php
                                        echo $result['cusName']
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>:</td>
                                    <td><?php
                                        echo $result['cusAdd']
                                        ?></td>
                                </tr>
                                <tr>

                                    <td>Mã thành phố</td>
                                    <td>:</td>
                                    <td><?php
                                        echo $result['cusCity']
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Thành phố</td>
                                    <td>:</td>
                                    <td><?php
                                        echo $result['cusCon']
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>SĐT</td>
                                    <td>:</td>
                                    <td><?php
                                        echo $result['cusPhone']
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php
                                        echo $result['cusName']
                                        ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <a href="editprofile.php">Cập nhật thông tin</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>

                </div>

            </div>

        </div>
        <center><a href="?orId=order" class="submit_order">Thanh toán</a> </center>

    </div>
</form>
<?php
include 'inc/footer.php';

?>