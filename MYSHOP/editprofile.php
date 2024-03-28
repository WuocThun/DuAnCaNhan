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
    $id = Session::get('customer_id');

    if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['save'])) {
        $update_cus =  $cus->update_cus($_POST, $id);
    }
    ?>
<?php
    if (isset($update_cus)) {
        echo $update_cus;
    }
    ?>
<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h3> Cập nhật thông tin người dùng</h3>
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
                        <td> <input type="text" name="cusName" value="<?php
                                                                                echo $result['cusName']
                                                                                ?>"> </td>

                    </tr>
                    <!-- <tr>
                                <td>Địa chỉ</td>
                                <td>:</td>
                                <td> <input type="text" name="cusAdd" value="<?php
                                                                                echo $result['cusAdd']
                                                                                ?>"> </td>


                            </tr> -->
                    <!-- <tr>
                        <td>Thành phố</td>
                        <td>:</td>
                        <td> <input type="text" name="cusCity" value="<?php
                                                                        echo $result['cusCity']
                                                                        ?>"> </td>

                    </tr> -->
                    <!-- <tr>
                        <td>Quốc gia</td>
                        <td>:</td>
                        <td> <input type="text" name="cusCon" value="<?php
                                                                        echo $result['cusCon']
                                                                        ?>"> </td>
                    </tr> -->
                    <!-- <tr>
                        <td>Mã Zip</td>
                        <td>:</td>
                        <td> <input type="text" name="cusZip" value="<?php
                                                                        echo $result['cusZip']
                                                                        ?>"> </td>
                    </tr> -->
                    <tr>
                        <td>SĐT</td>
                        <td>:</td>
                        <td> <input type="text" name="cusPhone" value="<?php
                                                                                echo $result['cusPhone']
                                                                                ?>"> </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td> <input type="text" name="cusEmail" value="<?php
                                                                                echo $result['cusEmail']
                                                                                ?>"> </td>

                    </tr>
                    <!-- <tr>
                        <td>Pass</td>
                        <td>:</td>
                        <td> <input type="text" name="cusPass" value="<?php
                                                                        echo $result['cusPass']
                                                                        ?>"> </td>

                    </tr> -->
                    <tr>
                        <td colspan="3">
                            <input type="submit" name="save" value="Save" class="grey">
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
</form>
</div>
</div>
</div>
<?php
include 'inc/footer.php';

?>