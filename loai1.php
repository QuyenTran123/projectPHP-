<?php 
session_start();
include('header2.php');
include('connect.php');

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
<content>
  
  <?php
if ($con) {
    if (checkId_Category($con,1) == 0) {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<script language='javascript'>";
    echo "alert('thank you order')";  //not showing an alert box.
    echo "</script>";
      exit;
  }
      $result = mysqli_query($con,"SELECT * FROM product WHERE category_id = 1");
      echo "<form method='post' enctype='multipart/form-data'>";
      echo "<div style='width: 100%; float: left; '>";
      while($row = mysqli_fetch_array($result)) {
        echo "<center>";
        echo "<div style='width: 32% ; float: left; border-style: ridge;'>";
        echo "<p>" . $row['prod_name'] . "</p>";
        echo "<img style='width: 30%; height: 140px;' src=". $row['image'] . ">"; 
        echo "<p>" . $row['price'] . "</p>";//echo "<p>" . $row['quantity'] . "</p>";
        echo "<p><a href='loai1.php?page=products&action=add&id={$row['id']}'><img class='giohang' src='images/giohang.png'></a></p>";
        echo "</div>";
        echo "</center>";
      }
      echo "</div>";
        echo " </form>";
        
    }
}

?>
</content>
<!-- <?php include('footer.php'); ?> -->
<?php function add()
{
  if (confirm('are you sure')) {
    return true;
  }
}

function checkId_Category($con,$id) {
  $result1= mysqli_query($con,"SELECT * FROM product WHERE category_id = '$id' ");
  while($row = mysqli_fetch_array($result1)) {
    if ($id == $row['category_id']) {
      return 0;       
    }else{
      return 1;
      break; 
    }
  }
} ?>



