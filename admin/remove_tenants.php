<?php
    session_start();
    include_once('dbconnect.php');
    include('header.php');


$query = "select * from users where _delete = 0";
$fire = mysqli_query($con,$query);
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "UPDATE users SET _delete = 1 WHERE id = $id";
    $fire = mysqli_query($con,$query) or die("Cannot delete data from database".mysqli_error($con));
}
if($_SESSION){
?>
 </div>
				 <div class="clearfix"></div>
			  </div>

<div class="gallery pages">
	  <div class="container">
		 <h2 class="cust-head">All Users</h2>	


<table class="table table-bordered">
	<Tr class="success">
		<th>Sr.No</th>
		<th>Name</th>
		<th>Email</th>
		</Tr>
        <div class="col-lg-7">
        

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM users where _delete=0";
                $fire = mysqli_query($con,$query) or die("Cannot fetch data from database".mysqli_error($con));
                //if ($fire) echo "We got the data";
                if (mysqli_num_rows($fire)>0){
                    $i=1;
                    // $users = mysqli_fetch_assoc($fire);

                    while($user = mysqli_fetch_assoc($fire)){

                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    
                    <td>
                        <a class="btn btn-sm btn-danger" href="<?php $_SERVER['PHP_SELF']?>?del=<?php echo $user['id']?>">DELETE</a>

                    </td>
                    
                </tr>
                <?php
                $i++;
                }
                }
                ?>

                </tbody>
            </table>



        </div>


</div>
</div>
</div>
</div>
<?php
}
    include('footer.php');

?>