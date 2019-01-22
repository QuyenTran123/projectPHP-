<?php session_start();
include 'header2.php';
function changeViews($con, $prod_id){
	$sql = "SELECT xem FROM product WHERE id = '$prod_id'";
	$result = $con->query($sql);
	if ($result) {
		$row=mysqli_fetch_array($result);
		$view = $row['xem'];
	}
	$view++;
	$sql = "UPDATE product SET xem = $view WHERE id = '$prod_id'";
	if ($con->query($sql)) {
		
	}
}
changeViews($con, $_GET['id']);
?>



<!-- <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="./css/ChiTietYellow.css">

	<?php 
		if(isset($_GET['action']) && $_GET['action']=="add"){   
        $id=intval($_GET['id']);       
        if(isset($_SESSION['cart'][$id])){ 
            $_SESSION['cart'][$id]['quantity']++; 
        }else{ 
               $result1= mysqli_query($con,"SELECT * FROM product 
                WHERE id={$id}");
            if(mysqli_num_rows($result1)!=0){ 
                $row_s=mysqli_fetch_array($result1); 
                $_SESSION['cart'][$row_s['id']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
            }else{      
                $message="This product id it's invalid!";      
            } 
        }        
    } 
	 ?>
<?php	
	require 'connect.php';
    $id=$_REQUEST['id'];
    $query = "SELECT * from product where id='".$id."'"; 
    $result = mysqli_query($con, $query) or die ( mysqli_error());
    // $row = mysqli_fetch_assoc($result);
    while($row = mysqli_fetch_assoc($result)) { ?>
	<div class="row backSmall">
		<div class="col-sm-4">
			<div class="row ">
				<div class="col-xs-4 active thongTin ">
					<figure><?php echo "<img style='width: 121px; height: 100px;background:orange' src=". $row['image'] ." onclick='hover(this)' >"; ?></figure>
				</div>
				<div class="col-xs-4 thongTin1 ">
					<figure><?php echo "<img style='width: 121px; height: 100px;background:pink' src=". $row['image'] ." onclick='hover(this)' >"; ?></figure>
				</div>
				<div class="col-xs-4 thongTin1" >
					<figure><?php echo "<img style='width: 121px; height: 100px;background:red' src=". $row['image'] ." onclick='hover(this)' >"; ?></figure>
				</div>
			</div>
		<div class="container" style="display: block">
			<img id="ExpandedImg" <?php echo "<img style='width: 300px' src=". $row['image'] . ">"; ?>
			<div id="imgText"  ></div>
		</div>
		<script type="text/javascript">
			function hover(imgs) {
				var expandImg=document.getElementById("ExpandedImg");
				var imgText = document.getElementById("imgText");
				ExpandedImg.src=imgs.src;
				imgText.innerHtml=imgs.alt;
				expandImg.parentElement.style.display="block";
			}
		</script>					
		</div>
		<div class="col-sm-4 chiTiet">
			<p><h1><?php echo $row["prod_name"]; ?></h1></p>
			<p style="color: red;font-size: 20px;">Quantity : <?php echo $row["quantity"]; ?></p>
			<hr>
			<tr>
				<p><strong>Start in </strong><button type="button" class="btn btn-warning"><?php echo $row["sale"]; ?></button> <strike style='font-size: 25px'><?php echo $row["price"]; ?></strike> </p>
			</tr>
			<p style="color: red;font-size: 20px;" ><image src="images/view.png" style="width: 30px"></image> <?php echo $row["xem"]; ?></p>
			<p>Save up to 20% on this app and its in-app items when you purchase <strong>Amazon Coins</strong>.<a href="#"> Learn More</a><br>Sold by : Acura<br><strong>Available </strong><span style="color: green">instanly</span><br><strong>This app needs permison to access </strong>
			</p>
		</div>
		<div class="col-sm-4 buy">
			<br>
			<p>Buy now</p>
			<p>This is item does not ship to <strong>Aric</strong>. Please check other seller who many ship internationality .<a href="#">Learn more</a> </p>
			<h3 style="color: green">In Stock </h3>
			<br>
			<div class="row">
				<div class="col-xs-6 pay">
					<label for="quantity" class="a-native-dropdown">You pay : </label>
				</div>
				<div class="col-xs-6">
					<input type="radio" name="pay" value="male" > Cash<br>
					<input type="radio" name="gender" value="female"> Visa Card<br>
					<input type="radio" name="gender" value="other"> Other
				</div>
			</div>
			<div class="row">
					<div class="col-xs-7">
						<p style="padding-left: 10px;color: orange;padding-right: 20px;">Add To Cart</p>			
					</div>
					<div class="col-xs-5">
							<?php
								echo "<p><a href='product.php?page=products&action=add&id={$row['id']}'><img class='giohang' src='images/giohang.png' style='width:70px;height:50px'></a></p>";
							?>	
					</div>
					</div>
					<br>
			<div>
				
				<!-- <input  type="button" class="btn btn-warning cart" onclick="location.href='file:///D:/Bootstrap/ProjectCar/modal-giohang.html'"  value="Add To Cart"  /> 
			</div> -->
		</div>
	</div>
<?php } ?>
<?php include('footer.php'); ?>
<!-- <script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script> -->

