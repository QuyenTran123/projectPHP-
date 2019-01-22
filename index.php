<?php session_start();
 include('header1.php'); 
include('connect.php');
?>
<content>
<?php 
    if (isset($_POST['search']))
     {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $research = $_POST['research'];
          if ($con)
          {
            $sqlsearch = "SELECT * FROM product WHERE prod_name LIKE '%$research%' OR price LIKE '%$research%' limit  9";
            $result1 = mysqli_query($con,$sqlsearch); 
            echo "<form method='post' enctype='multipart/form-data'>";
              echo "<div style='width: 100%; float: left; '>";
                while($row = mysqli_fetch_array($result1))
                 {
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
  <div class="container-fluid" >
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php 
            $sql1 = "SELECT * FROM product WHERE status = 4";
            $resProd = mysqli_query($con,$sql1);
            $count = 0;
            $a = '';
            while ($rowProd = mysqli_fetch_assoc($resProd)){
              if ($count == 0) {
                $a = 'active';
              }else{
                $a = '';
              }
              echo "<div class='carousel-item $a'><img class='d-block w-100' src=".$rowProd['image']."></div>";  
              $count++; 
            } 
          ?>  
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>       
        </div>
    </div>
      <div class ="row row1" style="padding-left: 30px;padding-left: 100px">
        <?php
              $count=1;
              $sel_query="SELECT * from product WHERE status = 3";
              $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                  <a href="chitietproduct.php?id=<?php echo $row["id"]; ?>" 
                   class = 'column col-md-4 col-sm-4 col-xs-4 embed-responsive embed-responsive-16by9' id = 'zoomIn' id = 'zoomIn'>
                    <figure>
                      <img class='rounded embed-responsive-item'  
                      <?php 
                        echo "<img style='width: 250px; height: 250px;' src=". $row['image'] . ">"; 
                      ?> 
                      >
                    </figure>
                          </a>
                </tr>
        <?php $count++; } ?> 
      </div>
    <div>
      <br>
      <h1 ><center><strong>The Watches For Your Life</strong></center></h1>
      <center><hr style="color: red;"></center>
      <div class="acr-underheading"></div>
    </div>
    <br/><br />
    <center><h2>New Product</h2></center>
    <div class="row" style="padding-left: 50px;">
      <?php
            $count=1;
            $sel_query="SELECT * from product WHERE status = 2";
            $result = mysqli_query($con,$sel_query);
              while($row = mysqli_fetch_assoc($result)) { ?>
                <div class='item col-md-4'>
                <div class='box embed-responsive embed-responsive-16by9'><a href=''><img class='rounded embed-responsive-item'  <?php echo "<img style='width: 300px; height: 200px;' src=". $row['image'] . ""; ?> ></a>
                 <a href=''><div class='boxContent'>
                <p class='description'><strong>MDX</strong></p>
                <button class='btn btn-info'><a href="chitietproduct.php?id=<?php echo $row["id"]; ?>">Đặt hàng</a></button>
                </div></a>
                </div>
                </div>
              </tr>
      <?php $count++; } ?> 
      <button><a href="login.php" title=""></a></button>
    </div>
    <center><h2>Sales Product</h2></center>
    <div class="row" style="padding-left: 50px;">
      <br>
        <?php
            $count=1;
            $sel_query="SELECT * from product limit 3";
            $result = mysqli_query($con,$sel_query);
              while($row = mysqli_fetch_assoc($result)) { ?>
                <div class='item col-md-4'>
                <div><a href=''><img class='rounded embed-responsive-item'  <?php echo "<img style='width: 400px; height: 300px;' src=". $row['image'] . ""; ?> ></a>
                 <a href=''><div class='boxContent'>
                <tr>
                  <br>
                  <center><p style="font-size: 20px"><td><strike><?php echo $row["price"]; ?> dong</strike></td>
                  <td ><?php echo $row["sale"]; ?> dong</td></p>
                </tr>
                <button class='btn btn-info'><a href="chitietproduct.php?id=<?php echo $row["id"]; ?>">Đặt hàng</a></button></center>
                </div></a>
                </div>
                </div>
              </tr>
      <?php $count++; } ?> 
    </div> <br>
  </div>
  <br><br><br>
    <a href="index.php"><center><div><button class="btn-info" style="width: 150px; height: 50px;">More</button></div></center></a><br>
  </div>
</content><br> 
<?php include('footer.php') ?>

