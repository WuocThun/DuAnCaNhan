<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php'; ?>
<?php
$cat = new category();
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$del_Cat = $cat->del_category($id);
}
?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<?php
					if (isset($del_Cat)) {
						echo $del_Cat;
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
					$show_cat = $cat->show_category();
					$i = 0;
					if (isset($show_cat)) {
						while ($result = $show_cat->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php
									echo $result['catId']
									?></td>
								<td><?php
									echo $result['catName']
									?></td>
								<td><a href="catedit.php?catid=<?php echo $result['catId'] ?>">Edit</a> |
									| <a onclick="return confirm('bạn có muốn xoá')" href="?delid=<?php echo $result['catId'] ?>">Delete</a>
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