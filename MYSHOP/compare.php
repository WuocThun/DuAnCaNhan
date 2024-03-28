<?php
include 'inc/header.php';
// include 'inc/slider.php';

// if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
//     $quanlity = $_POST['quanlity'];
//     $cartId = $_POST['cartId'];
//     $update_Quanlity_cart =  $cart->update_Quanlity_cart($quanlity, $cartId);
// }

// if (isset($_GET['cartId'])) {
//     $cartId = $_GET['cartId'];
//     $del_cart = $cart->del_cart($cartId);
// }

if (isset($_GET['delId'])) {
    $id = $_GET['delId'];
    $del_Compare = $pd->del_Compare($id);
}
// if (!isset($_GET['id'])) {
//     echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
// }
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>My Favorite</h2>
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
                        <th width="20%">ID compare</th>
                        <th width="20%">Product Name</th>
                        <th width="20%">Image</th>
                        <th width="15%">Price</th>
                        <th width="15%">Action</th>
                    </tr>
                    <?php
                    $customer_id = Session::get('customer_id');

                    $getCompare = $pd->getCompare($customer_id);
                    if ($getCompare) {
                        $i = 0;
                        while ($result = $getCompare->fetch_assoc()) {
                            $i++;
                    ?>
                            <td><?php echo $i ?></td>
                            <td><?php
                                echo $result['productName']
                                ?></td>
                            <td><img width="200px" src="admin/uploads/<?php
                                                                        echo $result['image']
                                                                        ?>" alt="" /></td>
                            <td><?php
                                echo $result['price'] . " VNĐ"
                                ?></td>
                            <td>
                                <a href="details.php?proId=<?php echo $result['product_id'] ?>">Buy now</a>
                                <a onclick="return confirm('Do u want to delete?')" href="?delId=<?php echo $result['product_id'] ?>">Delete</a>


                            </td>
                            <!-- <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" min="1" max="10" />
                                        <input type="number" name="quanlity" value="<?php echo $result['quanlity'] ?>" />
                                        <input type="submit" name="submit" value="Update" />
                                    </form>
                                </td> -->

                            </tr>

                    <?php

                        }
                    }
                    ?>
                </table>
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