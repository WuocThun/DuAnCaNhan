<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
$fm = new Format();
$cart = new cart();
if (isset($_GET['shiftid'])) {
	$id = $_GET['shiftid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shift = $cart->shift($id, $time, $price);
}
if (isset($_GET['delId'])) {
	$id = $_GET['delId'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$delShift = $cart->delShift($id, $time, $price);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th> No.</th>
						<th>Time</th>
						<th>product</th>
						<th>quanlity</th>
						<th>price</th>
						<th>Customer Id</th>
						<th>Add</th>
						<th>Act</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($shift)) {
						echo $shift;
					}
					if (isset($delShift)) {
						echo $delShift;
					}
					$cart = new cart();
					$getInboxCart = $cart->getInboxCart();
					if ($getInboxCart) {
						while ($result = $getInboxCart->fetch_assoc()) {

					?>
							<tr class="even gradeC">
								<td><?php
									echo $result['orId']
									?></td>
								<td><?php
									echo $fm->formatDate(
										$result['dateOrder']
									);
									?> </td>
								<td><?php
									echo $result['productName']
									?> </td>
								<td><?php
									echo $result['customerId']
									?> </td>
								<td><?php
									echo $result['quanlity']
									?> </td>
								<td> <?php
										echo $result['price']
										?></td>
								<td><a href="customer.php?customer_id=<?php echo $result['customerId'] ?> ">xem khách hàng</a>
								</td>

								<td> <?php
										if ($result['status'] == '0') {
										?>
										<a href="?shiftid=<?php echo $result['orId'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['dateOrder'] ?>">Đã
											ghi nhận</a>
									<?php
										} elseif ($result['status'] == '1') {
									?>
										<!-- <a
                                href="?delId=<?php echo $result['orId'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['dateOrder'] ?>">Đợi -->
										đợi khách xác nhận ?
										<!-- </a> -->
									<?php

										} else {
									?>
										<a href="?delId=<?php echo $result['orId'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['dateOrder'] ?>">Đã
											Khách đã nhận đơn</a>
									<?php
										}
									?>
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