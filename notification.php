<?php 
session_start();
include_once('dbconnect.php');
$id = $_SESSION['usr_id'];
include('header.php');?>
 </div>
				 <div class="clearfix"></div>
			  </div>
<?php

$query="select * from users where id=$id";
$fire = mysqli_query($con,$query) or die("Cannot find code".mysqli_error($con));
$row = mysqli_fetch_assoc($fire);
$email=$row['email'];

$fire = mysqli_query($con,"select * from notice where user ='".$email."'") or die("Cannot find code".mysqli_error($con));
if(!$row)
{?>
<div class="content-sec success"><p><?php echo "No any notice for You.";?></p></div>
<?php 
}
else
{
?>


<div class="gallery pages">
	  <div class="container">
		 <h2 class="cust-head">All Notifications</h2>	
			<table class="table table-bordered">
				<Tr class="success">
					<th>Sr.No</th>
					<th>Subject</th>
					<th>Details</th>
					<th>Date</th>
					</Tr>
					<?php 
						$i=1;
						while($row=mysqli_fetch_assoc($fire))
						{
							echo "<Tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$row['subject']."</td>";
							echo "<td>".$row['Description']."</td>";
							echo "<td>".$row['Date']."</td>";
							echo "</Tr>";
							$i++;
						}
					?>
			</table>

	 </div>
</div>





<?php }
include('footer.php');?>