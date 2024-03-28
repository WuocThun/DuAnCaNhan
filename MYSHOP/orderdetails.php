<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
// if (isset($_GET['orId']) && $_GET['orId'] == 'order') {
//     $customer_id = Session::get('customer_id');
//     $inserOrder = $cart->insertOrder($customer_id);
//     $delCart = $ct->delAllDataCat();
//     header("Location: susscess.php");
// }
// if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
//     $addToCart =  $cart->addToCart($quanlity, $id);
// }
$customer_id = Session::get('customer_id');
if ($customer_id == false) {
    header("location: login.php");
}
if (isset($_GET['reciveId'])) {
    $id = $_GET['reciveId'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $orderRecived = $cart->orderRecived($id, $time, $price);
}
?>
<style>
.box_left {
    width: 100%;
    border: 1px solid #666;
    padding: 4px;
}
</style>
<form>
    <div class="main">
        <div class="content">
            <h2>Đơn hàng của bạn</h2>
            <div class="section group">

                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">
                        <table class="tblone">

                            <tr>
                                <th width="5%">TT</th>
                                <th width="15%">Tên sản phẩm</th>
                                <th width="15%">Giá</th>
                                <th width="25%">Số lượng</th>
                                <th width="10%">Tổng tiền</th>
                                <th width="10%">Ngày đặt</th>
                                <th width="10%">Trạng thái</th>
                                <!-- <th width="10%">Action</th> -->
                            </tr>
                            <?php
                            $customer_id = Session::get('customer_id');
                            $getCartOrded = $cart->getCartOrded($customer_id);
                            if ($getCartOrded) {
                                $qty = 0;
                                $i = 0;
                                while ($result = $getCartOrded->fetch_assoc()) {
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
                                        <?php echo $result['quanlity'] ?>
                                    </form>
                                </td>
                                <td> <?php
                                                $total = $result['price'] * $result['quanlity'];
                                                echo $total . " VNĐ";
                                                ?>

                                </td>
                                <td><?php
                                            echo $fm->formatDate(
                                                $result['dateOrder']
                                            );
                                            ?></td>
                                <td>
                                    <?php
                                            if ($result['status'] == '0') {
                                                echo 'Đã nhận đơn';
                                            } elseif ($result['status'] == '1') {
                                            ?>
                                    <a
                                        href="?reciveId=<?php echo $result['orId'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['dateOrder'] ?> ">đã
                                        nhận được
                                        hàng ?</a>
                                    <?php

                                            } elseif ($result['status'] == '4') {
                                                echo 'Thành công';
                                            }
                                            ?>
                                </td>
                                <!-- <td><a href="?cartId=<?php echo $result['cartId'] ?>">Xoá</a></td> -->
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                        <div class="shopleft">
                            <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
</form>
<?php
include 'inc/footer.php';

?>