<?php 
//include('header.php');
include('connect.php');
?>

<?php 

//$id1 = isset($_POST['id']) ? (int)$_POST['id'] : '';
$id1 = $_GET['id'];

$sql = " DELETE FROM users WHERE id=$id1";
if (mysqli_query($con, $sql)) {
   	echo "string";
   	header('Location: UserCustomer.php');
    //echo $id1;
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
?>


<?php include('footer.php') ?>