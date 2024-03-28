<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();
if (isset($_GET['brandid'])) {
    $id = $_GET['brandid'];
    $del_brand = $brand->del_brand($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Brand list</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <?php
                    if (isset($del_brand)) {
                        echo $del_brand;
                    }
                    ?>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_brand = $brand->show_brand();
                    $i = 0;
                    if (isset($show_brand)) {
                        while ($result = $show_brand->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php
                                    echo $result['brandId']
                                    ?></td>
                        <td><?php
                                    echo $result['brandName']
                                    ?></td>
                        <td><a href="brandedit.php?editbrand=<?php echo $result['brandId'] ?>">Edit</a> |
                            | <a onclick="return confirm('bạn có muốn xoá')"
                                href="?brandid=<?php echo $result['brandId'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                    }

                    ?>
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