<?php session_start(); 
  include('header2.php');
    include('connect.php');
    GLOBAL $totalprice;

     ?>
      <?php 
   // echo $_GET['id'];
    //$id = $_GET['id'];
  function changeQuantity($con, $id){
    //$id = $_GET['id'];
  $sql = "SELECT quantity FROM product WHERE id = '$id'";
  $result = $con->query($sql);
  if ($result) {
    $row=mysqli_fetch_array($result);
    $view = $row['quantity'];
  }
  $view--;
  $sql = "UPDATE product SET quantity = $view WHERE id = '$id'";
  if ($con->query($sql)) {
    
  }
}


 ?>
     
<center><h1>Shopping Cart</h1></center> 
<!-- <a href="index.php?page=product">Go back to products page</a>  -->
<form method="post" action="showproduct.php?page=cart">
<!-- <?php //print_r($_SESSION['cart']); ?>  -->
  <center>
  <table class="table" style="width: 90%"> 
    <tr> 
      <th>Name</th> 
      <th>Quantity</th> 
      <th>Price</th>
      <th>Images</th>
      <th>Delete Product</th>
    </tr> 
   

  <?php 
      if (isset($_SESSION['cart'])) {
        $k = 0;
      $sql="SELECT * FROM product WHERE id IN (";
      foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.",";
        $k = $id; 
      } 
      $sql=substr($sql, 0, -1).") ORDER BY prod_name ASC"; 
      $query=mysqli_query($con,$sql); 
      $totalprice=0;
      while($row=mysqli_fetch_array($query)){  
      changeQuantity($con, $row['id']);      
        $subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price']; 
        $totalprice+=$subtotal;
      ?>
    <tr>
      <td><?php echo $row['prod_name'] ?></td> 
      <td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
      <td><?php echo $row['price'] ?>$</td> 
      <td><?php echo "<img style='width: 200px; height: 140px;' src=". $row['image'] . ">"; ?></td>
    <td><a href="cart.php?id=<?php echo $row['id'];?>">Delete</a></td> 
    </tr> 
    <?php } ?>  
    <?php echo "</br>"; ?>
    <tr> 
      <td colspan="5" style="text-align:center;font-size: 20px">Total Price: <?php echo $totalprice ?></td> 
    </tr>
    <?php
    if (isset($_GET['id'])) {
      $xoa = $_GET['id'];
      unset($_SESSION['cart'][$xoa]);
    }

      }else{
        echo " <script>
                 alert('giỏ hàng trống');
               </script>";
      }
      
    
     ?> 
    
  </table> 
  <hr style="width:  90%">
  <tr>
    <td><button class="btn-info" type="submit" name="submit">Information</button></td> 
    <td><button class="btn-info" type="submit" name="pay">Checkout</button></td>
  </tr>
  <hr style="width: 90%">
  <br><br>
  <div class="star" style="float: center;width: 500px;background: #c4c6c7">
   <table>
    <br>
     <tr><p>Xin vui long đánh giá sản phẩm của chúng tôi (1-5 )<p> </tr>
     <tr><?php include 'ratingStar.php' ?></tr>
   </table> 
  </div>
</center><br />
</form><br />

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
<?php 
if (isset($_SESSION['cart'])){
  if(isset($_POST['submit'])){
    $user = $_SESSION['user'];
    $query = "SELECT user_name,address, sdt, email FROM users WHERE user_name = '$user'; ";
    $result1 = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result1)) {
      echo "<tr>";
      echo "<td>".$row["user_name"]."</td>";
      echo "<td>".$row["address"]."</td>";
      echo "<td>".$row["sdt"]."</td>";
      echo "<td>".$row["email"]."</td>";
      echo "<tr>";
    }
  }
}
?> 
</tbody>
</table>

<?php 
if (isset($_SESSION['cart'])){
     if(isset($_POST['pay'])){
    $user = $_SESSION['user'];
    foreach ($_SESSION['cart'] as $key => $value) {     
      $query = "SELECT * FROM users WHERE user_name = '$user' ";
      $result1 = mysqli_query($con,$query);
      while($row = mysqli_fetch_assoc($result1)) {
        $cus_id = $row['id'];
        insert_orders($con,$cus_id,$key,$value['quantity']);
        //echo $row['quantity'];
      }
    }
    echo "<script>
            alert('Thank you');
          </script>";
        unset($_SESSION['cart']);
  }
}else{
  echo "giỏ hàng trống"; 
}
 
?>

<?php
function insert_orders($con,$cus_id,$prod_id, $quantity) {
  $sql = "INSERT INTO orders(cus_id, date) VALUES ('$cus_id',current_date())";
  if (mysqli_multi_query($con,$sql)) {
    //echo "haaa";
    $order_id = $con->insert_id;
    $sql1 = "INSERT INTO prod_orders(prod_id,order_id,quantity) VALUES ('$prod_id','$order_id','$quantity')";
    mysqli_multi_query($con,$sql1);
    return $con->insert_id;
    // $query = "SELECT `product`.`prod_name`, `prod_orders`.`quantity` FROM product, prod_orders WHERE `prod_orders`.`$prod_id` = `product`.`id`;";
    // $result1 = mysqli_query($con,$query);
    // while( $row = mysqli_fetch_assoc($result1)) {
    //         echo "<tr>";
    //         echo "<td>".$row["prod_name"]."</td>";
    //         echo "<td>".$row["quantity"]."</td>";
    //         echo "<tr>";
    //   }
  } else {
            echo "Error: " . $sql . "<br>" . $con->error;
  }
}
?>

<?php include('footer.php'); ?>
