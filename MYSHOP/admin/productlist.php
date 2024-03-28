<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include '../classes/product1.php';
$pd = new product1();
if (isset($_GET['proId'])) {
    $id = $_GET['proId'];
    $del_Pro = $pd->del_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <?php
                if (isset($del_Pro)) {
                    echo $del_Pro;
                }
                ?>
                <thead>
                    <a style="color: red;" href="productadd1.php">Thêm sản phẩm</a>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pro = new product1();
                    $show_product = $pro->show_product1();
                    $i = 0;
                    $temp = "uploads/";
                    if (isset($show_product)) {
                        while ($result = $show_product->fetch_assoc()) {
                            $i++;

                    ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php
                                    echo $result['productId'];
                                    ?> </td>
                                <td>
                                    <?php
                                    echo $result['productName'];
                                    ?> </td>
                                <td>
                                    <?php
                                    echo $result['catName'];
                                    ?> </td>
                                <td>
                                    <?php
                                    echo $result['brandName'];
                                    ?> </td>
                                <td>
                                    <?php
                                    echo $result['price'];
                                    ?> </td>
                                <td>
                                    <?php
                                    echo $result['product_desc'];
                                    ?> </td>
                                <td><?php

                                    if ($result['type'] == 0) {
                                        echo 'Hiển thị';
                                    } else {
                                        ' không hiển thị';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <img width="100" height="100" src="uploads/<?php echo $result['image'] ?>" alt="">
                                </td>
                                <td><a href="productedit.php?proId=<?php echo $result['productId'] ?>">Edit</a> ||
                                    <a onclick="return confirm('bạn có muốn xoá')" href="?proId=<?php echo $result['productId'] ?>">Delete</a>
                                </td>
                            </tr>
                    <?php

                        }
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>