<?php 
session_start();
include('header2.php');
include('connect.php');
$username = $_SESSION['user'];
$query = "SELECT * from users where user_name='".$username."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
 ?>

<?php 
 if (isset($_POST['submit'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['username']))
            {
                $Username = $_POST['username'];   
            }
        if(isset($_POST['password']))
            {
                $Password = $_POST['password'];
            }
            if(isset($_POST['address']))
            {
                $Address = $_POST['address'];
            }
            if(isset($_POST['sdt']))
            {
                $sdt = $_POST['sdt'];
            }
            if(isset($_POST['email']))
            {
                $Email = $_POST['email'];
            }
            if ($con) {
            	$update="UPDATE users SET user_name ='$Username', password='$Password',
                        address='$Address', sdt='$sdt', email='$Email' WHERE user_name='{$_SESSION['user']}'";
                        $_SESSION['user'] = $Username;
                        mysqli_query($con, $update) or die(mysqli_error());
            }
        }
    }
 ?>


 <center>
     <div class="">
        <h1 >Tạo Tài Khoản Mới</h1>
    </div>
    <div>
        <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" class="form-control input" name="username"  placeholder="User"  value="<?php echo $row['user_name'];?>" required="Ban Phai Nhap">
                    </div>
                     <div class="form-group">
                        <input type="password" class="form-control input" name="password" placeholder="Mật khẩu mới"  value="<?php echo $row['password'];?>" required="Ban Phai Nhap" >
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control input" name="address" placeholder="Address"  value="<?php echo $row['address'];?>" required="Ban Phai Nhap">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control input" name="sdt" placeholder="Phome Number"  value="<?php echo $row['sdt'];?>"required="Ban Phai Nhap">
                    </div>
                    <div class="form-group">
                        <a><input type="email"  name="email" class="form-control input" placeholder="Email"  value="<?php echo $row['email'];?>"required="Ban Phai Nhap"></a>
                    </div>
                   
                    <div>
                        <button type="submit" name="submit" value="Update" class="btn btn-danger register">Update</button>
                    </div>
        </form>
    </div>
</center>
<?php include('footer.php'); ?>