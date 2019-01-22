<?php 
    //session_start(); 
    include('connect.php');
    if(isset($_GET['page'])){ 
          
        $pages=array("product","cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="product"; 
              
        } 
          
    }else{ 
          
        $_page="product"; 
          
    } 
  
?> 

    <div id="container"> 
  
        <div id="main"> 
              
            <?php include($_page.".php"); ?> 
  
        </div><!--end of main--> 
          
        <div id="sidebar"> 
              
        </div><!--end of sidebar--> 
  
    </div><!--end container--> 
  
<h1>Giỏ Hàng Của Bạn</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM product WHERE id IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY prod_name ASC"; 
        $query=mysqli_query($con,$sql); 
        while($row=mysqli_fetch_array($query)){ 
        ?> 
            <p><?php echo $row['prod_name'] ?> x <?php echo $_SESSION['cart'][$row['id']]['quantity'] ?></p> 
        <?php 
        } 
    ?> 
        <hr /> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>