<?php
    session_start();
    include_once('dbconnect.php');
    include('header.php');
    $id=$_SESSION['usr_id'];

if(isset($_POST['payment'])){?>
    <div class="content-sec success"><p><?php echo "Thank you..!!";?></p><p><?php echo "Your payment was successfully processed.";?></p></div>
<?php 
}
else{
?>
 </div>
				 <div class="clearfix"></div>
			  </div>


<div class="gallery pages">
	  <div class="container">
		 <h2 class="cust-head">Pay Rent</h2>	
         <div class="content-sec">
         <?php
                $query="select * from users where id=$id";
                $fire=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($fire);?>
                <p>Welcome, <?php echo $row['name'];?></p>
                <p>Email id: <?php echo $row['email'];?></p>
                <p>Apartment-no: <?php  echo $row['apt_no'];?></p>
                
                <div class="card-details">
                <div class="modal-body">
        <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <div class="row display-tr">
                        <h3 class="panel-title display-td" style="text-align: left; float: left; padding-top:10px; vertical-align: middle; ">Payment Details</h3> 
                        <div class="display-td">
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber" style="text-align: left;">CARD NUMBER</label> 
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required="" autofocus="">
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry" style="text-align: left;"><span class="hidden-xs" style="text-align: left;">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required="">
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC" style="text-align: left;">CV CODE</label>
                                    <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required="">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode" style="text-align: left;">COUPON CODE</label>
                                    <input type="text" class="form-control" name="couponCode">
                                </div>
                            </div>                        
                        </div> -->
                        <div class="form-group">
                        <input type="submit" name="payment" value="Pay" class="btn btn-primary" />
                    </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
                </div>
               
                </div>
           </div>

	 </div>
</div>
<?php } 
?>

</div>
<?php
    include('footer.php');
?>