<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../classes/comment.php');
// $fm = new Format();
$comment =  new comment();
if (isset($_GET['delComment'])) {
    $id = $_GET['delComment'];
    $turnOnBanner = $comment->delComment($id);
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
                        <th>CusID</th>
                        <th>type</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getAllcomment = $comment->getAllcomment();
                    if ($getAllcomment) {
                        $i = 0;
                        while ($result_comment  = $getAllcomment->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr>
                                <td><?php
                                    echo $i;
                                    ?></td>
                                <td><?php
                                    echo $result_comment['customer_id'];
                                    ?></td>
                                <td><?php
                                    echo $result_comment['content'];
                                    ?></td>
                                <td><a href="?delComment=<?php echo $result_comment['id'] ?>">Delete</a></td>
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