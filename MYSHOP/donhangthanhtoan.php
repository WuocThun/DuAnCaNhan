<?php
include 'inc/header.php';
// include 'inc/slider.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
    $quanlity = $_POST['quanlity'];
    $cartId = $_POST['cartId'];
    $update_Quanlity_cart =  $cart->update_Quanlity_cart($quanlity, $cartId);
}

if (isset($_GET['cartId'])) {
    $cartId = $_GET['cartId'];
    $del_cart = $cart->del_cart($cartId);
}
// if (!isset($_GET['id'])) {
//     echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
// }
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <?php
                if (isset($_GET['congthanhtoan']) == 'vnpay') {

                ?> <h2>VNPAY PAYEMNT</h2>
                <?php
                }
                ?>
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
                        <th width="20%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="20%">Total Price</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                    $getProductCart = $cart->getProductCart();
                    if ($getProductCart) {
                        $qty = 0;
                        $subtotal = 0;
                        while ($result = $getProductCart->fetch_assoc()) {

                    ?>
                            <tr>
                                <td><?php
                                    echo $result['productName']
                                    ?></td>
                                <td><img src="admin/uploads/<?php
                                                            echo $result['image']
                                                            ?>" alt="" /></td>
                                <td><?php
                                    echo $result['price'] . " VNĐ"
                                    ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" min="1" max="10" />
                                        <input type="number" name="quanlity" value="<?php echo $result['quanlity'] ?>" />
                                        <input type="submit" name="submit" value="Update" />
                                    </form>
                                </td>
                                <td> <?php
                                        $total = $result['price'] * $result['quanlity'];
                                        echo $fm->format_currency($total) . " VNĐ";
                                        ?>

                                </td>
                                <td><a href="?cartId=<?php echo $result['cartId'] ?>">Xoá</a></td>
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
                            echo $fm->format_currency($subtotal) . ' VNĐ';
                            Session::set('sum', $subtotal);
                            Session::set('qty', $qty);

                            $vat = $subtotal * 0.1;

                            ?>

                        </td>
                    </tr>

                    <tr>
                        <th>Grand Total :</th>
                        <td> <?php
                                $gtotal = $subtotal + $vat;
                                echo $fm->format_currency($gtotal) . ' VNĐ';
                                ?> </td>
                    </tr>
                    <?php
                        if (isset($_GET['congthanhtoan']) == 'vnpay') {
                    ?>
                        <form method="POST" action="congthanhtoan.php">
                            <?php
                            $intGtotal = (int)$gtotal;

                            ?>
                            <input type="hidden" name="total_thanhtoan" value="<?php echo $intGtotal ?>">
                            <button class="btn btn-success" name="redirect" id="redirect">Thanh toán qua VNPAY</button>

                        </form>
                    <?php
                        }
                    ?>
                </table>
            <?php
                    } else {
                        echo "Giỏ hàng của bạn đang trống, hãy mua thêm";
                    }
            ?>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <a href="payment.php"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
include 'inc/footer.php';

?>