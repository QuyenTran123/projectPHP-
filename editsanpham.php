<?php
require ('connect.php');
include ('header2.php');

    $id=$_REQUEST['id'];
    $query = "SELECT * from product where id='".$id."'"; 
    $result = mysqli_query($con, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);
        ?>
            <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8">
                            <title>Update Record</title>
                                <link rel="stylesheet" href="css/style.css" />
                    </head>
                        <body>
                            <div class="form">
                                <?php    include 'menungang.php' ?>
        <?php
            $status = "";
                if(isset($_POST['new']) && $_POST['new']==1)
                {
                    $id=$_REQUEST['id'];
                    $prod_name=$_REQUEST['prod_name'];
                    $category_id=$_REQUEST['category_id'];
                    $price=$_REQUEST['price'];
                    $quantity=$_REQUEST['quantity'];
                    $status=$_REQUEST['status'];
                    $imported_date=$_REQUEST['imported_date'];
                    $imageURL = $row["image"];

                        $update="update product set prod_name='".$prod_name."', category_id='".$category_id."',
                        price='".$price."', price='".$price."', quantity='".$quantity."', status='".$status."', imported_date='".$imported_date."' where id='".$id."'";
                        mysqli_query($con, $update) or die(mysqli_error());
                        
                        echo ("<script LANGUAGE='JavaScript'>
                         window.alert('Succesfully Updated');
                         window.location.href='viewsanpham.php';
                         </script>");
                        // $status = "Record Updated Successfully. </br></br>
                        // <a href='viewsanpham.php'>View Updated Record</a>";
                        // echo '<p style="color:#FF0000;">'.$status.'</p>';
                }else {
                    ?>
                        <div class="index">
                           <div class="menusp">
                             <div>
                               <?php include 'menudoc.php' ?>
                             </div>    
                           </div>
                           <div class="sanpham">
                              <center><h1>Update</h1></center>
                               
                                      <form name="form" method="post" action=""> 
                                        <input type="hidden" name="new" value="1" />
                                        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                                          <div class="form-group sp">
                                              <input type="text" class="form-control" name="prod_name" placeholder="Tên sản phẩm" value="<?php echo $row['prod_name'];?>">
                                          </div>
                                          <div class="form-group sp">
                                              <input type="number"  name="category_id" min="1" max="10" class="form-control" placeholder="Thể loại" value="<?php echo $row['category_id'];?>" >
                                          </div>
                                          <div class="form-group sp">
                                              <input type="number" min="0" class="form-control" name="price" placeholder="Gía sản phẩm"
                                              value="<?php echo $row['price'];?>"  >
                                          </div>
                                          <div class="form-group sp">
                                              <input type="number" class="form-control" name="quantity" placeholder="Tên" value="<?php echo $row['quantity'];?>">
                                          </div>
                                          <div class="form-group sp">
                                              <input type="number"  name="status" class="form-control" placeholder="Tình trạng" value="<?php echo $row['status'];?>" >
                                          </div>
                                          <div class="form-group sp">
                                              <input type="date" class="form-control" min="2015-01-01" max="2019-12-31" name="imported_date" placeholder="Mật khẩu mới" value="<?php echo $row['imported_date'];?>"  >
                                          </div>
                                         <!--  <div>
                                              <img src="<?php echo $target_file ?>" style="width: 200px; height: 200px;">
                                              <input type="file" name="file">
                                                
                                           </div> -->
                                            <div>
                                              <?php

                                             $result = mysqli_query($con,"SELECT * FROM product where id='$id'");
                                             echo "<form method='post' enctype='multipart/form-data'>";
                                                 
                                             $i = 1;
                                             echo "<div style='width: 100%; float: left; '>";
                                             while($row = mysqli_fetch_array($result))
                                                  {  
                                                      
                                                      echo "<img style='width: 30%; height: 140px;' src=". $row['image'] . ">"; 
                                                     
                                                  }
                                                  echo " </form>";



                                          ?>
                                          
                                              <input type="file" name="file">
                                                
                                           </div>
                                          <div>
                                              <center><p><input name="submit" type="submit" value="Update" /></p></center>
                                          </div>
                                </form>
                                <?php } ?>
                                </div>   
                          </div> 
                    </div>       
        </div>
    </div>
<?php include('footer.php'); ?>