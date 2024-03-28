<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (!isset($_GET['proId']) || $_GET['proId'] == null) {
    echo " <script>'window.location = '404.php'; </script>";
} else {
    $id = $_GET['proId'];
}
if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
    $quanlity = $_POST['quanlity'];
    $addToCart =  $cart->addToCart($quanlity, $id);
}
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="heading">
                <h3>Thanh toán Online</h3>
            </div>

        </div>
    </div>
    <form action="donhangthanhtoan.php?congthanhtoan=vnpt" method="POST">
        <div class="row">
            <div class="col-md-3">
                <!-- <a class="btn btn-success" href="thanhtoanonepay.php">Thanh toán qua VNPAY</a> -->
                <button class="btn btn-success" name="redirect" id="redirect">Thanh toán qua VNPAY</button>
            </div>
        </div>
    </form>
    <h3>Đang trong quá trình phát triển thêm....</h3>
</div>
<?php
include 'inc/footer.php';
?>