<?php 
include('header2.php');
require('connect.php');
//include("auth.php");
 ?>
 <?php include ('menungang.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="index">
	<div class="menusp">
		<div id="menudoc" style="padding-top: 30px;">
		    <ul>
		      <br>
		      <li><a href="viewsanpham.php"><h5>Trang Quản Trị Admin</h5></a></li>
		      <br>
		      <strong><li>+ Tổng số don hang: <?php $result2=mysqli_query($con,"SELECT count(*) as `total` from orders");
				$data=mysqli_fetch_assoc($result2);
				echo $data['total']; ?></li></strong>
		      <br>
		    </ul>
		</div>
		<div>
		</div>
	</div>
	<div class="sanpham">
		<div class="row">
			<tr>
				<td>
					<div class="col-md-8">
						<center><h1>Quản lý Don Hang</h1></center>
					</div>	
				</td>
			</tr>
		</div>
		<div class="form">
			<table class="table table-striped">
				<thead>
					<tr>
						<center><th><strong>S.No</strong></th></center>
						<!-- <center><th><strong>Cus_id</strong></th></center> -->
						<center><th><strong>Date</strong></th></center>
						<center><th><strong>Delete</strong></th></center>

					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="SELECT * from orders ;";
						$result = mysqli_query($con,$sel_query);
							while($row = mysqli_fetch_assoc($result)) { ?>
							<tr><td align="center"><?php echo $count; ?></td>
								<!-- <td align="center"><?php echo $row["cus_id"]; ?></td> -->
								<td align="center"><?php echo $row["date"]; ?></td>
								<td align="center">
									<a href="deletecart.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure delete?')"><button class="btn btn-info" type="submit" name="delete">Delete</button></a>
								</td>

							</tr>
					<?php $count++; } ?>
			</tbody>
		</table>
	</div>	
</div>
</div>
<div>
</div>			

	
	
