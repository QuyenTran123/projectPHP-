<?php 
include('header2.php');
require('connect.php');
//include("auth.php");
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<?php include ('menungang.php'); ?>
<body>
<div class="index">
	<div class="menusp">
		<?php include 'menudoc.php' ?>	
	</div>
	<div class="sanpham">
		<div class="row">
			<tr>
				<td>
					<div class="col-md-8">
						<center><h1>Quản lý Sản Phẩm</h1></center>
					</div>	
				</td>
				<td>
					<div class="col-md-4 searchsp">
						<div style="
							  padding: 6px 10px;
							  margin-top: 8px;
							  margin-right: 16px;
							  background: #ddd;
							  font-size: 17px;
							  border: none;
							  cursor: pointer;
							">
							    <form method="post">
							      <input type="text" placeholder="Search.." name="research">
							      <button type="submit" name="search">search</button>
							    </form>
  						</div>
					</div>
				</td>
			</tr>
		</div>
		<div class="form">
			<table class="table table-striped">
				<thead>
					<tr>
						<th><strong>S.No</strong></th>
						<th><strong>Prod_name</strong></th>
						<th><strong>Category</strong></th>
						<th><strong>Price</strong></th>
						<th><strong>Quantity</strong></th>
						<th><strong>Status</strong></th>
						<th><strong>Date</strong></th>
						<th><strong>Images</strong></th>
						<th><strong>Edit</strong></th>
						<th><strong>Delete</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from product ORDER BY id desc;";
						$result = mysqli_query($con,$sel_query);
							while($row = mysqli_fetch_assoc($result)) { ?>
							<tr><td align="center"><?php echo $count; ?></td>
								<td align="center"><?php echo $row["prod_name"]; ?></td>
								<td align="center"><?php echo $row["category_id"]; ?></td>
								<td align="center"><?php echo $row["price"]; ?></td>
								<td align="center"><?php echo $row["quantity"]; ?></td>
								<td align="center"><?php echo $row["status"]; ?></td>
								<td align="center"><?php echo $row["imported_date"]; ?></td>
								<td align="center"><?php echo "<img style='width: 90%; height: 140px;' src=". $row['image'] . ">"; ?></td>
								<td align="center">
									<a href="editsanpham.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-info">Edit</button></a>
								</td>
								<td align="center">
									<a href="deletesanpham.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure delete?')"><button class="btn btn-info">Delete</button></a>
								</td>
								<!-- <td align="center">
									<a href="insertsanpham.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-info">Insert</button></a>
								</td> -->
							</tr>
					<?php $count++; } ?>
			</tbody>
		</table>
	</div>	
</div>
</div>
<div>
	<?php 
	  if (isset($_POST['search'])) {
	  	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		  		$research = $_POST['research'];
		  		$sqlsearch = "SELECT * FROM product WHERE prod_name LIKE '%$research%' OR status LIKE '%$research%' OR category_id LIKE '%$research%' OR price LIKE '%$research%'  OR quantity LIKE '%$research%' ";
		  		$result1 = mysqli_query($con,$sqlsearch);
		  		echo "<form method='post' enctype='multipart/form-data'>";
				echo "<center><table border='1' class = 'table table-bordered' style='width:55%;float:center;'>	
					<tr>
						<th><strong>S.No</strong></th>
						<th><strong>Prod_name</strong></th>
						<th><strong>Category</strong></th>
						<th><strong>Price</strong></th>
						<th><strong>Quantity</strong></th>
						<th><strong>Status</strong></th>
						<th><strong>Date</strong></th>
						<th><strong>Images</strong></th>
						<th><strong>Edit</strong></th>
						<th><strong>Delete</strong></th>
						<th><strong>Insert</strong></th>
					</tr>";
				$i = 1;
				while($row = mysqli_fetch_array($result1))
				{
					echo "<tr>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $row['prod_name'] . "</td>";
					echo "<td>" . $row['category_id'] . "</td>";
					echo "<td>" . $row['price'] . "</td>";
					echo "<td>" . $row['quantity'] . "</td>";
					echo "<td>" . $row['status'] . "</td>";
					echo "<td>" . $row['imported_date'] . "</td>";
					echo "<td>" . $row['image'] . "</td>";
					echo "<td><a href='editsanpham.php?id=".$row['id']."' >Edit</a></td>";
					echo "<td><a href='insertsanpham.php?id=".$row['id']."' >Insert</a></td>";
					echo "<td><a href='deletesanpham.php?id=".$row['id']."' >Delete</a></td>";
					echo "</tr>";
					$i++;
				}
				echo "</table></center>";
				echo " </form>";
		 	}	
		}	
?>
</div>			

	
	
