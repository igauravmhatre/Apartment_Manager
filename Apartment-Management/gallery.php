<?php
session_start();
include_once 'dbconnect.php';
include 'header.php'; 
?>

	</div>	
		<div class="clearfix"></div>		
	</div>		  
<!---->
<script src="js/lightbox-plus-jquery.min.js"></script>
<div class="gallery pages">
	  <div class="container">
		 <h2 class="cust-head">Gallery</h2>	
		
		 <div class="gallery-bottom">
				<div class="gallery-1">
					<div class="col-md-3 gallery-grid">
						<a class="example-image-link" href="images/r2.jpg" data-lightbox="example-set"><img class="example-image" src="images/r2.jpg" alt=""/></a>
					</div>
					<div class="col-md-3 gallery-grid">
						<a class="example-image-link" href="images/r1.jpg" data-lightbox="example-set"><img class="example-image" src="images/r1.jpg" alt=""/></a>
					</div>
					<div class="col-md-3 gallery-grid">
						<a class="example-image-link" href="images/r3.jpg" data-lightbox="example-set"><img class="example-image" src="images/r3.jpg" alt=""/></a>
					</div>
					<div class="col-md-3 gallery-grid">
						<a class="example-image-link" href="images/r4.jpg" data-lightbox="example-set"><img class="example-image" src="images/r4.jpg" alt=""/></a>
					</div>
					<div class="clearfix"></div>
				</div>
				
							
		 </div>
	 </div>
</div>

<?php
			
		 include('footer.php');
?>