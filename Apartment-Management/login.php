<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
    $row = mysqli_fetch_array($result);
   if($row['_delete'] != 1){
        if ($row) {
            $_SESSION['usr_id'] = $row['id'];
            $_SESSION['usr_name'] = $row['name'];
            header("Location: index.php");
        } else {
            $errormsg = "Incorrect Email or Password!!!";
        }   
    }
    else {
        $errormsg = "User Account was Deleted Please Register Again";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Login Script</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
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
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Login</legend>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group" style="text-align:center;">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center" style="color:#fff;";>    
        New User? <a href="register.php" style="color:#fff";>Sign Up Here</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php 
include('footer.php');?>
