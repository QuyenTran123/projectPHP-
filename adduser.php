<?php 
include('header2.php');
include('connect.php');
?>


<?php 
    if (isset($_POST['Add'])) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['username']))
            {
                $User = $_POST['username'];
                $_SESSION['username'] = $User;
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
               $query = "INSERT INTO `users` (user_name,address,sdt, email)
                         VALUES ('$User','$Address','$Phone','$Email')";
                         if (mysqli_multi_query($con, $query)) {
                            echo "<script language='javascript'>";
                            echo "alert('Register susseccful')"; 
                            echo "</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
            }
            
        }
    } 
            
 ?>

<center>
	<h1>Thêm Khách Hàng</h1>
	<div>
        <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" class="form-control input" name="username" placeholder="User" required="Ban Phai Nhap">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control input" name="address" placeholder="Address" required="Ban Phai Nhap">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control input" name="sdt" placeholder="Phome Number" required="Ban Phai Nhap">
                    </div>
                    <div class="form-group">
                        <a><input type="email"  name="email" class="form-control input" placeholder="Email" required="Ban Phai Nhap"></a>
                    </div>
                   
                    <div>
                        <button type="submit" name="Add" value="Add" class="btn btn-danger register">Add</button>
                    </div>
        </form>
    </div>
</center>
<br>
<?php include('footer.php') ?>