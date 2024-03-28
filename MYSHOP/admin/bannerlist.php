<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../classes/banner.php');
include_once($filepath . '/../helpers/format.php');
$fm = new Format();
$banner = new banner();
if (isset($_GET['onBaner'])) {
    $id = $_GET['onBaner'];
    $turnOnBanner = $banner->turnOnBanner($id);
}
if (isset($_GET['offBaner'])) {
    $id = $_GET['offBaner'];
    $delShift = $banner->turnOffBaner($id);
}
if (isset($_GET['delBanner'])) {
    $id = $_GET['delBanner'];
    $delBanner = $banner->delBanner($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>type</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($turnOnBanner)) {
                        echo $turnOnBanner;
                    }
                    if (isset($turnOffBanner)) {
                        echo $turnOffBanner;
                    }
                    $getAllBanner = $banner->getAllBanner();
                    if ($getAllBanner) {
                        while ($result = $getAllBanner->fetch_assoc()) {

                    ?>
                    <tr class="even gradeC">
                        <td><?php
                                    echo $result['id']
                                    ?></td>
                        <td>
                            <img width="100" height="100" src="uploads/<?php echo $result['image'] ?>" alt="">
                        </td>
                        <td>

                            <?php
                                    if ($result['type'] == '0') {
                                    ?>

                            <a href="?onBaner=<?php echo $result['id'] ?> ">Off</a>
                            <?php

                                    } else {
                                    ?>
                            <a href="?offBaner=<?php echo $result['id'] ?> ">On</a>
                            <?php

                                    }
                                    ?>

                        </td>

                        <td>
                            <a href="?delBanner=<?php echo $result['id'] ?> ">Xoá ảnh</a>
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