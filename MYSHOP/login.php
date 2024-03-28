<?php
include 'inc/header.php';
// include 'inc/slider.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insert_customer = $cus->insert_customer($_POST);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $login_customer = $cus->login_customer($_POST);
}
?>
<?php
//néu ng dùng dã đăng nhập thì vào trang order
$login_check = Session::get('customer_login');
if ($login_check) {
    header("location: order.php");
}
?>
<div class="main">
    <div class="content">
        <div class="login_panel">
            <h3>Đăng nhập</h3>
            <?php
            if (isset($login_customer)) {
                echo $login_customer;
            }
            ?>
            <form action="" method="POST" id="member">
                <input type="text" name="email" class="field" placeholder="Nhập Email">
                <input type="password" name="password" class="field" placeholder="Nhập mật khẩu">
                <p class="note">Quên mật khẩu? <a href="#">Tại đây!</a></p>
                <div class="buttons">
                    <div><input type="submit" name="login" value="Đăng nhập" class="grey"></input></div>
                </div>
            </form>
        </div>
        <?php

        ?>
        <div class="register_account">
            <h3>Đăng ký tài khoản</h3>
            <?php
            if (isset($insert_customer)) {
                echo $insert_customer;
            }
            ?>
            <form action="" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="cusName" placeholder="Nhập tên">
                                </div>

                                <div>
                                    <input type="text" name="cusCon" placeholder="Nhập thành phố">
                                </div>

                                <div>
                                    <input type="text" name="cusZip" placeholder="Nhập Zip-Code">
                                </div>
                                <div>
                                    <input type="text" name="cusEmail" placeholder="Nhập E-Mail">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="cusAdd" placeholder="Nhập Address">
                                </div>
                                <div>
                                    <select id="country" name="cusCity">

                                        <option value="DAD">Đà Nẵng</option>
                                        <option value="HCM">Hồ Chí Minh</option>
                                        <option value="HAN">Hà Nội</option>

                                    </select>
                                </div>

                                <div>
                                    <input type="text" name="cusPhone" placeholder="Nhập Số">
                                </div>

                                <div>
                                    <input type="text" class="field" name="cusPass" placeholder="Nhập mật khảu">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><input type="submit" name="submit" value="Đăng ký" class="grey"></input></div>
                </div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.
                </p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<?php
include 'inc/footer.php';

?>