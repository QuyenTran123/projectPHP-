<html>
<head><title>Rating star</title></head>
<body>
  <form method="post" action="ratingStar.php">
   <label></label><input type="hidden" name="minstar" value="1">
   <label></label>
    <input type="hidden" name="maxstar" value="5">
    <label></label>
    <input type="text" name="rating" value="">
    <input type="submit" name="submit" value="submit">
  </form>
  <br><br>
</body>
</html>
<?php
if($_POST){
  $cfg_min_stars = $_POST['minstar'];
  $cfg_max_stars = $_POST['maxstar'];
  $temp_stars = $_POST['rating'];

  for($i=$cfg_min_stars; $i<=$cfg_max_stars; $i++) {
   
    if ($temp_stars >= 1) { 
      echo '<img src="images/Star (Full).png" width="40"/>';
      $temp_stars--; 
    }else {
      if ($temp_stars >= 0.5) { 
       echo '<img src="images/Star (Half Full).png" width="40"/>';
        $temp_stars -= 0.5;
      }else { 
        echo '<img src="Star (Empty).png" width="40"/>';
      }
    }
  }
}
?>
