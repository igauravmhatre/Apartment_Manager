<?php
session_start();
include_once'dbconnect.php';
include("header.php");

?>
<!---->
<div class="contact">
	 <div class="container">
				<h2>Contact</h2>
			<div class="footer-bottom">
					<div class="col-md-4 footer-left">
						<div class="f-1">
							<span class="glyphicon3 glyphicon-phone-alt" aria-hidden="true"></span>
							<p>+1 234 567 9871</p>
						</div>
						<div class="f-1">
							<a href="#"><span class="glyphicon3 glyphicon-envelope2" aria-hidden="true"></span></a>
							<p><a href="mailto:example@email.com">empiretower19@gmail.com</a></p>
						</div>
						<div class="f-1">
							<span class="glyphicon3 glyphicon-map-marker" aria-hidden="true"></span>
							<p>756 gt globel Place, CD-Road,M 07 435.</p>
						</div>
					</div>
					<div class="col-md-8 footer-right">
						<input type="text" value="Your Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Name';}"/>
						<input type="text" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}"/>
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Message';}">Your Message</textarea>
						<div class="contact-but">
							<form>
								<input type="submit" value="Send" />
							</form>
						</div>
					</div>
				<div class="clearfix"></div>
		 </div>
</div>
	 </div>
</div>
<?php
	include("footer.php")
?>
