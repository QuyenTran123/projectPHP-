<?php 
session_start();
include('header2.php');
include('connect.php');
 global $count;
 $count = 0;
 ?>
<?php include 'menungang.php' ?>
<center><h1><a href="adduser.php">ADD USER</a></h1></center>
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


		<?php 
			$result = mysqli_query($con,"SELECT * FROM users");
			echo "<form method='post' enctype='multipart/form-data'>";
			echo "<table border='1' class = 'table'>	
			<tr>
			<th>ID</th>
			<th>User_Name</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Xem</th>
			</tr>";
			$i = 1;
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $i . "</td>";
				echo "<td>" . $row['user_name'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['sdt'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td><a href='delete1.php?id=".$row['id']."' >Delete</a></td>";
				echo "</tr>";
				$i++;
			}
			echo "</table>";
			echo " </form>";
			//echo mysqli_query($con,"SELECT count(*) FROM users;");

		 ?>

		<div>Tổng số users:  <input type="text" name="usernumber" value='<?php $result2=mysqli_query($con,"SELECT count(*) as `total` from users");
			$data=mysqli_fetch_assoc($result2);
			echo $data['total']; ?>'>
		</div>

<?php 
	  if (isset($_POST['search'])) {
	  	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		  		$research = $_POST['research'];
		  		$sqlsearch = "SELECT * FROM users WHERE user_name LIKE '%$research%' OR id LIKE '%$research%' OR address LIKE '%$research%' OR sdt LIKE '%$research%'  OR email LIKE '%$research%' ";
		  		$result1 = mysqli_query($con,$sqlsearch);
		  		echo "<form method='post' enctype='multipart/form-data'>";
				echo "<table border='1' class = 'table'>	
				<tr>
				<th>ID</th>
				<th>User_Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Email</th>
				<th>Xem</th>
				</tr>";
				$i = 1;
				while($row = mysqli_fetch_array($result1))
				{
					echo "<tr>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $row['user_name'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "<td>" . $row['sdt'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td><a href='delete1.php?id=".$row['id']."' >Delete</a></td>";
					echo "</tr>";
					$i++;
				}
				echo "</table>";
				echo " </form>";
		 	}	
		}	
?>
<br><br>

<?php include('footer.php') ?>
