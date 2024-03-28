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
    ?> <div class="main">
    <div class="content">
        <div class="section group">
            <div class="heading">
                <h3>Thông tin người dùng</h3>
            </div>
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
                            <td>Thành phố</td>
                            <td>:</td>
                            <td><?php
                                echo $result['cusCity']
                                ?></td>
                        </tr>
                        <tr>
                            <td>Quốc gia</td>
                            <td>:</td>
                            <td><?php
                                echo $result['cusCon']
                                ?></td>
                        </tr>
                        <tr>
                            <td>Mã Zip</td>
                            <td>:</td>
                            <td><?php
                                echo $result['cusZip']
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
                            <td>Pass</td>
                            <td>:</td>
                            <td><?php
                                echo $result['cusPass']
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
<?php
include 'inc/footer.php';

?>