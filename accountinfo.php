<?php session_start();
include 'dbconnect.php';
include 'header.php';
?>
             </div>
                 <div class="clearfix"></div>
              </div>
<div class="gallery account-info pages">
      <div class="container">
         <h2 class="cust-head">Account Settings</h2>    
         <?php
            if($_SESSION){
                $id=$_SESSION['usr_id'];
                $query= "SELECT * FROM users where `id`= $id";
                $fire=mysqli_query($con,$query) or die(mysql_error());;
                $row = mysqli_fetch_assoc($fire);
                $id=$row['id'];
                // echo $id;?>
                <div class="info-content">
                <div><label for="name">Name: </label><?php echo $row['name'];?> 
                <div><label for="name">Email: </label><?php echo $row['email'];?></div>
                <?php
            }
            else{
            echo "Account Deleted Successfully";
            }
            ?> 
            <a class="btn  btn-warning" href="del_account.php?upd=<?php echo $row['id']?>">Delete Account</a>
            <a class="btn btn-success" href="editinfo.php?upd=<?php echo $row['id']?>">Edit Info</a></div>
            </div>

         
     </div>
</div>





<?php

include 'footer.php';
?>
