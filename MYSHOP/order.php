<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
//
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header("location: login.php");
}
?>
<style>
    h2 {
        color: red;
        text-align: center;
    }
</style>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <div class="order_page">
                    <h2>Order page...</h2>
                </div>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
include 'inc/footer.php';

?>