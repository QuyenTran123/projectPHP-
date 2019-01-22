<?php
include 'header2.php';
require('connect.php');
//include("auth.php");
$status = "";
if(isset($_POST['submit']) && $_POST['new']==1){
    $targetDir = "uploads/";
    $fileName = $targetDir.basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['file']['tmp_name'], $fileName);
    $prod_name=$_REQUEST['prod_name'];
    $category_id=$_REQUEST['category_id'];
    $price=$_REQUEST['price'];
    $quantity=$_REQUEST['quantity'];
    $status=$_REQUEST['status'];
    $imported_date=$_REQUEST['imported_date'];
    //$image=$_REQUEST['target_file'];

    $ins_query="INSERT INTO product
    (`prod_name`,`category_id`,`price`,`quantity`,`status`,`imported_date`,`image`)values
    ('$prod_name','$category_id','$price','$quantity','$status','$imported_date','$fileName')";

    mysqli_query($con,$ins_query) or die(mysql_error());
    //echo "Succesfully Updated";
    header('Location: viewsanpham.php');       
}
?>
<!-- <?php

    $query1 = mysqli_query($con,"SELECT image FROM product ORDER BY id DESC");
        if(mysqli_num_rows($query1) > 0){
            while($row = mysqli_fetch_assoc($query1))
                {
                    $imageURL = 'uploads/'.$row["image"];
?>
                     <img src="<?php echo $imageURL; ?>" alt="" />
<?php 
               }
}else{ 
    ?>
       <p>No image(s) found...</p>

    <?php } ?> -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<div>
<?php include 'menungang.php' ?>
<div class="index">
    <div class="menusp">
        <div>
            <?php include 'menudoc.php' ?>
        </div>    
    </div>
            <div class="sanpham">
                <center><h1>Insert</h1></center>
                <form name="form" method="post" action="" enctype="multipart/form-data"> 
                    <input type="hidden" name="new" value="1" />
                <div class="form-group">
                    <input type="text" class="form-control" name="prod_name" placeholder="Tên sản phẩm" required="Xin hay nhap" >
                    </div>
                <div class="form-group">
                    <input type="number"  name="category_id" min="1" max="10" class="form-control" placeholder="Id thể loại của sản phẩm " required="Xin hay nhap">
                </div>
                <div class="form-group">
                    <input type="number" min="0" class="form-control" name="price" placeholder="Gía sản phẩm" required="Xin hay nhap">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm" required="Xin hay nhap">
                </div>
                <div class="form-group">
                    <input type="number"  name="status" class="form-control" placeholder="Tình trạng" required="Xin ha nhap">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" min="2015-01-01" max="2019-12-31" name="imported_date" placeholder="Mật khẩu mới" required="Xin hay nhap">
                </div>
                <div>
                    <img src="<?php echo $target_file ?>" style="width: 200px; height: 200px;">
                    <input type="file" name="file">
                    <!-- <input type="submit" name="submit1" value="Upload"> -->
                </div>
                <center><p><input name="submit" type="submit" value="Submit" /></p></center>
            </form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</div>
</div>
<?php include('footer.php'); ?>