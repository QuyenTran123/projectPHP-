<?php
include('connect.php');
GLOBAL $_SESSION;
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
<link rel="stylesheet" type="text/css" href="./css/ProjectCar1.css">
<link rel="stylesheet" type="text/css" href="./css/ProjectCarti.css">
<link rel="stylesheet" type="text/css" href="./css/Product.css">
<link rel="stylesheet" type="text/css" href="./css/stylety.css">
  <link rel="stylesheet" href="css/hieuunganh.css">

  <nav class="navbar navbar-fixed-top navbar-expand-md" style="background: black;" >

  <a href="index.php"><div class="navbar-item navbar-brand"><img class="img" src="images/logo.jpg"></div></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo01"> 

    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"style="color: white;">
          <strong>Product Portfolio</strong></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="loai1.php"><strong>ĐỒNG HỒ BẤM GIỜ</strong></a>
            <a class="dropdown-item" href="loai2.php"><strong>ĐỒNG HỒ ĐIỆN TỬ</strong></a>
          
    </div>
     

     
    </ul>
     <form method="post">
  <div class="input-group mb-3 inputsearch">
    <input id="search" type="text" name="research" class="form-control " placeholder="Search">  
      <div class="input-group-prepend">
        <button type="submit" name="search" class="btn btn-search" >Search</button>
      </div>
  </div>
</form>


  <?php 
    function countcart()
    {
      GLOBAL $_SESSION;
      return is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
        // return count($_SESSION['cart']);
    }
   ?>

   </div> 
       <a class="nav-link" href="showproduct.php?page=cart"><img class="giohang" src="images/giohang.png"><?php if (isset($_SESSION['cart'])) {
         echo countcart();}?></a>
    <?php
  if (isset($_SESSION['user']) == true) {
    echo '<a href="updateUser.php" style="text-decoration:none"><i class="icon fa fa-user"></i>'.$_SESSION['user'].'</a>'. '|<a href="logout.php"style="text-decoration:none"><i class="icon fa fa-sign-in"></i>Đăng xuất</a>';
  } else {
    echo "<a class='nav-link' href='login.php'>login</a>";
    echo "<a class='nav-link' href='register.php'>Register</a>";
  }
?> 


  </nav>
  <?php 
    if (isset($_POST['search'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $research = $_POST['research'];
        if ($con) {
           $sqlsearch = "SELECT * FROM product WHERE prod_name LIKE '%$research%' OR price LIKE '%$research%' limit  9";
          $result1 = mysqli_query($con,$sqlsearch); 
          echo "<form method='post' enctype='multipart/form-data'>";
        echo "<div style='width: 100%; float: left; '>";
        while($row = mysqli_fetch_array($result1)) {
        echo "<center>";
        echo "<div style='width: 32% ; float: left; border-style: ridge;'>";
        echo "<p>" . $row['prod_name'] . "</p>";
        echo "<img style='width: 30%; height: 140px;' src=". $row['image'] . ">"; 
        echo "<p>" . $row['price'] . "</p>";//echo "<p>" . $row['quantity'] . "</p>";
        echo "<p><a href='loai1.php?page=products&action=add&id={$row['id']}'><img class='giohang' src='images/giohang.png'></a></p>";
        echo "</div>";
        echo "</center>";
      }
        echo " </form>";
        echo "</div>";
        } 
      }
  } 
          
         
?>
