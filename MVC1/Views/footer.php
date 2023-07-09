<!-- footer-66 -->
<footer class="w3l-footer-66">
		<!-- footer -->
		<div class="footer-66-info">
			<div class="container">
				<div class="row footer-top">
					<div class="col-lg-4 footer-grid_section_w3layouts pr-lg-5">
						<h2 class="logo-2 mb-lg-4 mb-3">
							<a class="navbar-brand" href="home"><span>Dent</span>ile</a>
							<!-- if logo is image enable this   
									<a class="navbar-brand" href="#index">
										<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
									</a> -->
						</h2>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
							commodo consequat.</p>
						<h4 class="sub-con-fo ad-info my-4">Catch on Social</h4>
						<ul class="w3layouts_social_list list-unstyled">
							<li>
								<a href="#" class="w3pvt_facebook">
									<span class="fa fa-facebook-f"></span>
								</a>
							</li>
							<li>
								<a href="#" class="w3pvt_twitter">
									<span class="fa fa-twitter"></span>
								</a>
							</li>
							<li>
								<a href="#" class="w3pvt_dribble">
									<span class="fa fa-dribbble"></span>
								</a>
							</li>
							<li>
								<a href="#" class="w3pvt_google">
									<span class="fa fa-google-plus"></span>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-8 footer-right">
						<div class="w3layouts-news-letter">
							<h3 class="footer-title mb-0">Newsletter</h3>

							<p class="mb-3">By subscribing to our mailing list you will always get latest news and
								updates from us.
							</p>
							<form action="#" method="post" class="w3layouts-newsletter">
								<input type="email" name="Email" placeholder="Enter your email..." required="">
								<button class="btn1"> Subscribe</button>

							</form>
						</div>
						<div class="bottom-w3layouts-sec-nav">
							<div class="row sub-content-botom mx-0">
								<div class="col-md-4 footer-grid_section_w3layouts pl-lg-0">
									<h3 class="footer-title">Information</h3>
									<ul class="footer list-unstyled">
										<li>
											<a href="home">Home</a>
										</li>
										<li>
											<a href="about">About Us</a>
										</li>
										<li>
											<a href="blog">Blog</a>
										</li>
										<li>
											<a href="services">Services</a>
										</li>
										<li>
											<a href="contact">Contact Us</a>
										</li>
									</ul>
								</div>
								<div class="col-md-4 footer-grid_section_w3layouts">
									<!-- social icons -->

									<h3 class="footer-title">Treatments</h3>
									<ul class="footer list-unstyled">

										<li>
											<a href="#">Preventative Dentistry</a>
										</li>
										<li>
											<a href="#">Child Dentistry</a>
										</li>
										<li>
											<a href="#">Affordable Dentures</a>
										</li>
										<li>
											<a href="#">Tooth Extraction</a>
										</li>

									</ul>

									<!-- social icons -->
								</div>
								<div class="col-md-4 footer-grid_section_w3layouts ">
									<h3 class="footer-title">Working Hours</h3>
									<ul class="wrk-schedule-block">
										<li>Monday<span class="schedule-time">09:00 – 17:00</span></li>
										<li>Tuesday<span class="schedule-time">09:00 – 17:00</span></li>
										<li>Wednesday<span class="schedule-time">09:00 – 17:00</span></li>
										<li>Thursday<span class="schedule-time">09:00 – 17:00</span></li>
										<li>Friday<span class="schedule-time">09:00 – 17:00</span></li>
										<li>Sat day-Sunday<span class="schedule-time">Closed</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="cpy-right py-3">
			<p class="text-center">© 2020 Dentile. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
		<!-- move top -->
		<button onclick="topFunction()" id="movetop" title="Go to top">
			<span class="fa fa-level-up"></span>
		</button>
		<script>
			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function () {
				scrollFunction()
			};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("movetop").style.display = "block";
				} else {
					document.getElementById("movetop").style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>
		<!-- /move top -->
	</footer>
	<!--//footer-66 -->
</body>

</html>

<script src="<?php echo $this->baseURL ?>assets/js/jquery-3.3.1.min.js"></script>
<!-- disable body scroll which navbar is in active -->

<!--//-->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!--/scroll-down-JS-->
<!-- stats -->
<script src="<?php echo $this->baseURL ?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo $this->baseURL ?>assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<!-- //stats -->
<script src="<?php echo $this->baseURL ?>assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>
<!-- for blog carousel slider -->
<script src="<?php echo $this->baseURL ?>assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
	$(document).ready(function () {
		$('.owl-one').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<!-- //testimonials owlcarousel -->
<script>
	$(document).ready(function () {
		$('.owl-two').owlCarousel({
			loop: true,
			margin: 20,
			nav: false,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: false
				},
				1000: {
					items: 1,
					nav: false
				}
			}
		})
	})
</script>
<!-- //script for Testimonials-->
<!-- //script -->

<script src="<?php echo $this->baseURL ?>assets/js/bootstrap.min.js"></script>