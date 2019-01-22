<?php 
session_start();
include('header2.php');
include('connect.php');
//include('cart.php');
//include('index.php');

  
    if(isset($_GET['action']) && $_GET['action']=="add"){   
        $id=intval($_GET['id']);       
        if(isset($_SESSION['cart'][$id])){ 
            $_SESSION['cart'][$id]['quantity']++; 
            $dem++;
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
//current URL of the Page. cart_update.php redirects back to this URL
// $current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if ($con) {
    if (checkid_category($con,5) == 0) {
           $result = mysqli_query($con,"SELECT * FROM product WHERE category_id = 2");
   echo "<form method='post' enctype='multipart/form-data'>";
   echo "<div style='width: 100%; float: left; '>";
   while($row = mysqli_fetch_array($result))
        {   echo "<center>";
            echo "<div style='width: 32% ; float: left; border-style: ridge;'>";
           // echo "<p>" . $i . "</p>";
            echo "<p>" . $row['prod_name'] . "</p>";
            echo "<img style='width: 30%; height: 140px;' src=". $row['image'] . ">"; 
            echo "<p>" . $row['price'] . "</p>";
            //echo "<p>" . $row['quantity'] . "</p>";
            echo "<p><a href='showproduct.php?page=products&action=add&id={$row['id']}' onclick='return confirm('Are you sure add to cart?')'><img class='giohang' src='images/giohang.png'></a></p>";
            
            echo "</div>";
            echo "</center>";
        }
        echo " </form>";
echo "</div>";
    }
}

    function checkid_category($con,$id)
    {
        $result1= mysqli_query($con,"SELECT * FROM product WHERE category_id = '$id' ");
            while($row = mysqli_fetch_array($result1)){
                 if ($id == $row['category_id']) {
                  return 0;       
                }else{
                    return 1;
                    break; 
                }
           }
    }

?>
<!-- <?php include('footer.php'); ?> -->
   



