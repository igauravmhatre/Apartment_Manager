<?php 
    session_start();
    include_once 'dbconnect.php';
    include("header.php");
    $successmsg= null;

    if (isset($_POST['generate'])) {
        $code = mysqli_real_escape_string($con, $_POST['code']);
        $apt_no = mysqli_real_escape_string($con, $_POST['apt_no']);
        $query = "INSERT INTO Apartment.`registration` (`code`,`apt_no`) VALUES('$code','$apt_no')";
        $fire = mysqli_query($con,$query);
        $successmsg = "Successfully Generated!";
            header("Location: addtenants.php");
        }
    ?>
    
    <div class="contact">
    <div class="container">
        <div class = "row">
            <div class = "col-md-4 col-md-offset-4 well">
                <form role = "form" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" name ="loginform">
                    <fieldset>
                        <legend>Tenant Registration code </legend>
                        
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text"  readonly="readonly" name="code" value = "<?php echo rand(pow(10, 5-1), pow(10, 5)-1);?>" required class="form-control" />
                        </div>
    
                        <div class="form-group">
                            <label for="name">Apartment Number</label>
                            <input type="text" name="apt_no" placeholder="Enter Apt Number" required class="form-control" />
                        </div>
    
                        <div class="form-group" style="text-align:center;">
                            <input type="submit" name="generate" value="Generate" class="btn btn-primary" />
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

    <?php







    include("../footer.php");
?>