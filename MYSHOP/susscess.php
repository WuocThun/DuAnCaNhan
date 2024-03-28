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
    $quanlity = $_POST['quanlity'];
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

.susscess_note {
    text-align: center;
    padding: 8px;
    font-size: 17px;
}
</style>
<form>
    <div class="main">
        <div class="content">
            <div class="section group">

                <center>
                    <h2 style="color:red">Đặt hàng thành công</h2>
                </center>
                <?php
                $customer_id = Session::get('customer_id');
                $getAmount =  $cart->getAmount($customer_id);
                if ($getAmount) {
                    $amout = 0;
                    while ($result = $getAmount->fetch_assoc()) {
                        $price = $result['price'];
                        $amout += $price;
                    }
                }
                ?>
                <p class="susscess_note">Tổng tiền bạn phải thanh toán là:
                    <?php
                    $vat  = $amout * 0.5;
                    echo $total = $vat + $amout . " VNĐ";
                    ?>
                </p>
                <p class="susscess_note">Theo đõi đơn hàng tại <a href=" orderdetails.php">đây</a></p>
            </div>

        </div>

    </div>
</form>
<?php
include 'inc/footer.php';

?>