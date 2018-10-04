<?php session_start();
include 'dbconnect.php';
$id=$_SESSION['usr_id'];
$query= "SELECT * FROM users where `id`= $id";
    $fire=mysqli_query($con,$query) or die(mysql_error());;
    $row = mysqli_fetch_assoc($fire);
if($row['subscription']!=1){
$id=$_SESSION['usr_id'];

    $query = "UPDATE users SET subscription = 1 WHERE id = $id";
    $fire = mysqli_query($con,$query) or die("cannot update the data".mysqli_error($con));
    header('Location:subscription.php');
}
else{
    $query = "UPDATE users SET subscription = 0 WHERE id = $id";
    $fire = mysqli_query($con,$query) or die("cannot update the data".mysqli_error($con));
    header('Location:subscription.php');
}
?>
