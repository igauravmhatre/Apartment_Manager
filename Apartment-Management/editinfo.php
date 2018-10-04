<?php
session_start();
include('dbconnect.php');
include('header.php');

if($_SESSION){
    $id=$_SESSION['usr_id'];
    $query = "SELECT * FROM users WHERE id=$id";
    $fire = mysqli_query($con,$query) or die("Cannot fetch the data".mysqli_error($con));
    $row = mysqli_fetch_assoc($fire);
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $row['email'];
        $password = md5($_POST['password']);
        $query = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
        //$query = "UPDATE `crud` SET `fname`=['$fname'],`lname`=['$lname'],`email`=['$email'],`password`=['$password'] WHERE 1";
        $fire = mysqli_query($con,$query) or die("cannot update the data".mysqli_error($con));
        if(fire) header("Location:accountinfo.php");
    }
}
?>
<div class="contact">
<div class="container">
    <div class="row edit-form">
        <div class="col-md-4 col-md-offset-4 well ">
        <div>
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Update Info</legend>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name" value="<?php echo $row['name']?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="New Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm New Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <div class="form-group" style="text-align:center;">
                        <input type="submit" name="update" value="Update Info" class="btn btn-success"/>
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div> </div>
</div>
</div>
</div>


<?php
include('footer.php');
?>