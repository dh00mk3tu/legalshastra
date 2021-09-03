<!--footer-->
<style>
.tech-btm{
	color:black;
}
.blog-grid-right h5 a{
	color:white;
}



</style>
	<footer style="background-color:#0a2e52;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 footer-grid-agileits-w3ls text-left">
					<h3>About US</h3>
					<p style="color:white;"><?php getdescription("titles"); ?></p>
					
				</div>
				<div class="col-lg-6 subscribe-main footer-grid-agileits-w3ls text-left">
				    <h2>Contact Us</h2>
                    <div class="subscribe-main text-left">
							<div class="subscribe-form">
				                <form class="subscribe_form" >
            				    	<input class="form-control" type="email" placeholder="Enter your Email..." required="">
            				    	<textarea class="form-control" style="margin-top:15px;" placeholder="Enter Your Message..."></textarea>
            				    	<button type="submit" class="btn btn-primary submit">Submit</button>
				                </form>
				            </div>
				    </div>
				</div>
				<!-- subscribe -->
				<!--<div class="col-lg-4 subscribe-main footer-grid-agileits-w3ls text-left">-->
				<!--	<h2>Contact US</h2>-->
					<!--<div class="subscribe-main text-left">-->
					<!--		<div class="subscribe-form">-->
					<!--				<form action="#" method="post" class="subscribe_form">-->
					<!--					<input class="form-control" type="email" placeholder="Enter your email..." required="">-->
					<!--					<button type="submit" class="btn btn-primary submit">Submit</button>-->
					<!--				</form>-->
					<!--				<div class="clearfix"> </div>-->
					<!--	   </div>-->
					<!--	<p>We respect your privacy.No spam ever!</p>-->
					<!--</div>-->
					<!-- //subscribe -->
				<!--	<ul style="list-style:none">-->
				<!--	    <li></li>-->
				<!--	</ul>-->
				<!--</div>-->
			</div>
			<!-- footer -->
			<div class="footer-cpy text-center">
				<div class="footer-social">
					<div class="copyrighttop">
						<ul>
							<li class="mx-3">
								<a class="facebook" href="<?php getlinks("links","facebook");?>">
									<i class="fab fa-facebook-f"></i>
									<span class="text-white">Facebook</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="<?php getlinks("links","linkedin");?>">
									<i class="fab fa-linkedin"></i>
									<span class="text-white">Linkedin</span>
								</a>
							</li>
							<li class="mx-3">
								<a class="facebook" href="<?php getlinks("links","googleplus");?>">
									<i class="fab fa-instagram"></i>
									<span class="text-white">Instagram</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="mailto:legalshastrain@gmail.com">
									<i class="fa fa-envelope"></i>
									<span class="text-white">Gmail</span>
								</a>
							</li>
						
						</ul>

					</div>
				</div>
				<div class="w3layouts-agile-copyrightbottom">
					<p> Responsive Blog Site <?php $current=date("Y"); print_r($current);?> | Brought To You by CreatVision
						
					</p>

				</div>
			</div>
			<!-- //footer -->
		</div>
	</footer>