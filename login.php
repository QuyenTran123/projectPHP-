<?php 
session_start();
include('header2.php'); 
include('connect.php');
//include('header1.php');
?>
<?php 
if (isset($_POST['user'])){
    $username = stripslashes($_POST['user']);
    $username = mysqli_real_escape_string($con,$username); 
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con,$password);
  }
?>

<?php
   if (isset($_POST['submit'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['user']))
            {
                $User = $_POST['user'];
                $_SESSION['user'] = $User;  
            }
        if(isset($_POST['password']))
            {
                $Password = $_POST['password'];
                $_SESSION['password'] = $Password;
            } 
        if ($con){ 
            $result1= mysqli_query($con,"SELECT * FROM users");
                while($row = mysqli_fetch_array($result1)){
                    if ($User == $row['user_name'] && password_verify($Password,$row['password'])) {
                       echo '<script language="javascript>';
                                echo 'alert("Dang nhap than cong")';
                                echo '</script>';
                       header("Location: index.php");
                     }
                       elseif ($User=='user' && $Password=='password') {
                        header("Location: viewsanpham.php");
                       
                    }else{ 
                      echo "Login no succeccful";
                    }
                  }
                }     
            }
        }   
        //              
?>

  <content>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15662.997184111862!2d106.68219945!3d11.05741355!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1541561650719" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
            <form method="post"> 
            <div class="panel-danger">
            <div class="panel-heading">
            
            </div>
            <div class="panel-body" style="border: 0.5px solid pink;width: 85%" >
            <div class="form-group center" style="">
              <h2><strong> <center>Đăng Nhập</center></strong></h2>
               <label for="myEmail">User Name</label><br />
               <input type="text" class="form-control input1" name="user" style="width: 80%;" placeholder="User Name" required="Ban Phai Nhap" ><br />
               <label for="myPassword">Password</label><br />
               <input type="password" class="form-control input1" name="password" style="width: 80%;" placeholder="Password" required="Ban Phai Nhap" ><br />
               <button type="submit" class="btn btn-info " name="submit">Log in</button>
               <p style="width:300px ">Not registered yet? <a href='register.php'>Register Here</a></p>  
            </div>
          </div>
          </form> 
        </div>
      </div>
    </div>
  </content>

 <?php include('footer.php') ?>



	 