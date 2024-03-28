<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
// include '../classes/category.php';
// include '../classes/customer.php';
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../classes/customer.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
$cus = new customer();
if (!isset($_GET['customer_id']) || $_GET['customer_id'] == null) {
    echo " <script>'window.location = 'inbox.php'; </script>";
} else {
    $id = $_GET['customer_id'];
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $CatName = $_POST['CatName'];
//     $update_Cat = $cat->update_category($CatName, $id);
// }
?>
<?php
$cart = new cart();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <?php

        $getCustomer = $cus->show_customers($id);
        if ($getCustomer) {
            while ($result  = $getCustomer->fetch_assoc()) {
        ?>
                <div class="block copyblock">
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <th>Name</th>
                                <th>Add</th>
                                <th>Phone</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $result['cusName'] ?>
                                </td>
                                <td>
                                    <?php echo $result['cusCity'] ?>
                                </td>
                                <td>
                                    <?php echo $result['cusPhone'] ?>
                                </td>
                            </tr>

                        </table>
                        <a href="inbox.php">return</a>
                    </form>
            <?php
            }
        }
            ?>
                </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>