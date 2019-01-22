<?php
require('connect.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM `prod_orders` WHERE order_id = '$id';";
$query.= "DELETE FROM orders WHERE id = '$id';";
if (mysqli_multi_query($con,$query)) {
	echo "
	<script>
		alert('Xoá Thành Công');
	</script>
		";
}
header("Location: qlydonhang.php"); 
?>


