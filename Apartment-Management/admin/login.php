<?php
session_start();

if(isset($_SESSION['usr_name'])!="") {
    header("Location: index.php");
}

include_once 'dbconnect.php';
include('header.php');

//check if form is submitted
if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $query = "SELECT * FROM `admin` WHERE name = '" . $name. "' and password = '" . $password . "'";
    $fire = mysqli_query($con,$query);
    $row = mysqli_fetch_array($fire);
    $a_name=$row['name'];
        if ($row) {
            $_SESSION['usr_id'] = $row['id'];
            $_SESSION['usr_name'] = $row['name'];
            header("Location: index.php");
        } else {
            $errormsg = "Incorrect Email or Password!!!";
        }   
    }
?>


<div class=" custom-login">


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Login</legend>
                    
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" placeholder=" Admin Username" required class="form-control" />
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
    <!-- <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center" style="color:#fff;";>    
        New User? <a href="register.php" style="color:#fff";>Sign Up Here</a>
        </div>
    </div> -->
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
include('footer.php');
?>