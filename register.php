<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    
    $code = mysqli_real_escape_string($con, $_POST['code']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $query = "SELECT * FROM registration WHERE code = '$code'";
    $fire = mysqli_query($con,$query) or die("Cannot find code".mysqli_error($con));
    $row = mysqli_fetch_assoc($fire);
    $a_code = $row['code'];
    $apt_no = $row['apt_no'];
    echo $a_code;
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $fire = mysqli_query($con,$query) or die("cannot update the data".mysqli_error($con));
        $row=mysqli_fetch_assoc($fire);

        if($row!=null){
            if($row['_delete']==1){
            $query = "UPDATE users SET _delete=0,name='$name',password = '" . md5($password) . "' WHERE email='$email'";
            $fire=mysqli_query($con,$query) or die("cannot update the data".mysqli_error($con));
            header("Location: login.php");
            }
            else{
                $errormsg="User Account Already exists";
        }
    }
        else {
            $fire=mysqli_query($con, "INSERT INTO users(code,apt_no,name,email,password,mobile) VALUES('" . $code . "','" . $apt_no . "','" . $name . "', '" . $email . "', '" . md5($password) . "','" . $mobile . "')");
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
            header("Location: login.php");
        } 
    }    
    else {
            $errormsg = "Error in registering...Please try again later!";
            }     
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration Script</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

        <div class="banner">
        <div class="container">
<div class="banner_head_top">
    <div class="container">
             <div class="banner-head">
                 <div class="logo">
                     <h1><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><span> Empire Tower</span></a></h1>
                 </div>
                    <div class="headr-right">
                        <div class="details">
                                    <p></p>
                        </div>
                    </div>
                 <div class="clearfix"></div>
             </div>
             </div>
          </div>




          <div class=" custom-login">


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>
                    <div class="form-group">
                        <label for="code">Registration Code</label>
                        <input type="text" name="code" placeholder="Enter 5-Digit Registration Code" required value="<?php if($error) echo $code; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($code_error)) echo $code_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Mobile</label>
                        <input type="text" name="mobile" placeholder="Mobile" required value="<?php if($error) echo $mobile; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center" style="color:#fff;";>    
                   <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
</div>
</div>









</div>




<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php 
include('footer.php');?>