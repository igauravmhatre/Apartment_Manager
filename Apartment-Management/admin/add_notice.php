<?php 
session_start();
include_once('dbconnect.php');
include("header.php");?>
 </div>
				 <div class="clearfix"></div>
			  </div>
<?php
extract($_POST);
if(isset($add))
{

	if($details=="" || $sub=="" || $user=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
		foreach($user as $v)
		{
mysqli_query($con,"insert into notice values('','$v','$sub','$details',now())");
		}
		
		$err="<font color='green'>Notice added Successfully</font>";	
	}
}

?>










<div class="gallery pages">
	  <div class="container">
		 <h2 class="cust-head">Add New Notice</h2>	
			<form method="post">
				
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-4">Enter Subject</div>
		<div class="col-sm-5">
		<input type="text" name="sub" class="form-control"/></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8"></div>
	</div>	
	
	<div class="row">
		<div class="col-sm-4">Enter Details</div>
		<div class="col-sm-5">
		<textarea name="details" class="form-control"></textarea></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8"></div>
	</div>	
	
	<div class="row">
		<div class="col-sm-4">Select Tenant</div>
		<div class="col-sm-5">
		<select name="user[]" multiple="multiple" class="form-control">
			<?php 
	$fire = mysqli_query($con,"select name,email from users where _delete=0");
	while($row = mysqli_fetch_array($fire))
	{
		echo "<option value='".$row['email']."'>".$row['name']."</option>";
	}
			?>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8"></div>
	</div>	
		
		<div class="row" style="margin-top:10px">
		
		<div class="col-md-6 col-md-offset-4">
		<input type="submit" value="Add New Notice" name="add" class="btn btn-success"/>
		<!-- <input type="reset" class="btn btn-success"/> -->
		</div>
	</div>

			</form>

	 </div>
</div>





<?php 
include('footer.php');?>













