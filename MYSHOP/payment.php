<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location: login.php');
}

?> <?php
    // if (!isset($_GET['proId']) || $_GET['proId'] == null) {
    //     echo " <script>'window.location = '404.php'; </script>";
    // } else {
    //     $id = $_GET['proId'];
    // }
    // if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
    //     $quanlity = $_POST['quanlity'];
    //     $addToCart =  $cart->addToCart($quanlity, $id);
    // }
    ?>
<style>
    h3.payment {
        color: red;
        font-size: 30px;
        text-align: center;
        margin-bottom: 15px;
    }

    .payment_layout {
        border: 1px solid black;

        background-color: antiquewhite;
        align-self: center;
        justify-content: center;
        /* display: flex; */
        flex-direction: column;
    }

    .payment_href {
        margin-left: 300px;
        height: 500px;
        text-decoration: none;
        color: white;
        justify-content: center;
        border: 1px solid black;
        background-color: black;
        margin-bottom: 10px;
        font-size: 20px;
        text-align: center;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="heading">
                <h3>Thanh toán</h3>
            </div>
            <div class="clear"></div>
            <div class="payment_layout">
                <h3 class="payment">Chọn phương thức thanh toán</h3>
                <a class="payment_href" href="onlinepayment.php">Thanh toán Online</a>
                <a class="payment_href" href="offlinepayment.php">Thanh toán Offline</a>
            </div>
            <a href="cart.php">Quay lại</a>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';

?>