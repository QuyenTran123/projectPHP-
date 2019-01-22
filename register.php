<?php 
include('header2.php');
include('connect.php');
 ?>
<?php
if (isset($_POST['username'])){
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con,$username); 
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $address = stripslashes($_POST['address']);
    $address = mysqli_real_escape_string($con,$address);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con,$email);
}
?>
<?php 
    if (isset($_POST['submit'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['username']))
            {
                $User = $_POST['username'];
                $_SESSION['username'] = $User;
            }
            if(isset($_POST['password']))
            {
                $Password = $_POST['password'];
                $_SESSION['password'] = $Password;
            }
            if(isset($_POST['address']))
            {
                $Address = $_POST['address'];
                $_SESSION['address'] = $Address;
            }
             if(isset($_POST['sdt']))
            {
                $Phone = $_POST['sdt'];
                $_SESSION['sdt'] = $Phone;
            }
            if(isset($_POST['email']))
            {
                $Email = $_POST['email'];
                $_SESSION['email'] = $Email;
            }
            if ($con) {
                    if (checkUser($con,$_POST['username']) == 0 && checkEmail($con,$_POST['email']) == 0) {
                            $User = $_POST['username'];
                             $Email = $_POST['email'];
                            $query = "INSERT INTO `users` (user_name,address, password,sdt, email)
                             VALUES ('$User','$Address', '".password_hash($Password,PASSWORD_DEFAULT)."','$Phone','$Email')";
                             if (mysqli_multi_query($con, $query)) {
                                echo '<script language="javascript>';
                                echo 'alert("Dang nhap than cong")';
                                echo '</script>';
                                header("location:login.php");
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                   }else echo '<script language="javascript>';
                                echo 'alert("User hoặc email đã tồn tại ")';
                                echo '</script>';
            } 
        }
    } 
    function checkUser($con,$username)
    {
        $result1= mysqli_query($con,"SELECT * FROM users WHERE user_name = '$username' ");
        while($row = mysqli_fetch_array($result1)){
             if ($username != $row['user_name']) {
              return 0;       
            }else{
                return 1;
                break; 
            }
       }
    }

    function checkEmail($con,$email)
    {
        $result1= mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");
        while($row = mysqli_fetch_array($result1)){
             if ($email != $row['email']) {
              return 0;       
            }else{
                return 1;
                break; 
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
                      <input type="text" class="form-control input" name="username" placeholder="User" required="Ban Phai Nhap">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Mật khẩu mới" title="Phai chu 1 chu hoa 1 ky tu va it nhat 8 ky tu" required="Ban Phai Nhap" >
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control input" name="address" placeholder="Address" required="Ban Phai Nhap">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control input" placeholder="Phone Number" required="Bạn Phai Nhap">
                    </div>
                    <div class="form-group">
                        <a><input type="email"  name="email" class="form-control input" placeholder="Email" required="Ban Phai Nhap"></a>
                    </div>
                   
                    <div>
                        <button type="submit" name="submit" value="Register" class="btn btn-danger register">Register</button>
                    </div>
        </form>
    </div>
</center>
<?php include('footer.php') ?>