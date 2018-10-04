<?php session_start();
include 'dbconnect.php';
$id=$_SESSION['usr_id'];

// if(isset($_GET['upd'])){
//     $id = $_GET['upd'];
//     $query = "SELECT * FROM users WHERE id=$id";
//     $fire = mysqli_query($con,$query) or die("Cannot fetch the data".mysqli_error($con));
//     $row = mysqli_fetch_assoc($fire);
// }
    $query = "UPDATE users SET _delete = 1 WHERE id = $id";
    $fire = mysqli_query($con,$query) or die("cannot update the data".mysqli_error($con));

if(isset($_SESSION['usr_id'])) {
    session_destroy();
    unset($_SESSION['usr_id']);
    unset($_SESSION['usr_name']);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>