<!-- footer -->
<div class="footer_top_agileits">
		<div class="container">
			<div class="col-md-4 col-sm-4 footer_grid">
				<h3>About Us</h3>
				<p>Nam libero tempore cum vulputate id est id, pretium semper enim. Morbi viverra congue nisi vel pulvinar posuere sapien
					eros.
				</p>
				<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30591910525!2d-74.25986432970718!3d40.697149422113014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1518176526743"   allowfullscreen></iframe>
			</div>
			</div>
			<div class="col-md-4 col-sm-4 footer_grid">
			<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>8088 USA, Honey block, <span>New York City.</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>87 8088 9436</li>
				</ul>
				
			</div>
			<div class="col-md-4 col-sm-4 footer_grid">
				<h3>Follow Us</h3>
				<div class="wrapper">
					<ul class="social-icons icon-circle icon-zoom list-unstyled list-inline"> 
					<li> <a href="#"><i class="fab fa-facebook-f"></i></a></li> 
					<li> <a href="#"><i class="fab fa-linkedin-in"></i></a></li> 
					<li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
					<li> <a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
			</div>
			<div class="w3ls_links">
			<h3>Quick Links</h3>
				<ul>
							<li class="active"><a href="home">Home</a></li>
							<li><a href="services" >Services</a></li>
							<li><a href="projects">Projects</a></li>
							<!-- <li><a href="icons">Web Icons</a></li> -->
							<!-- <li><a href="typography">Typography</a></li> -->
							<li><a href="contact">Contact</a></li>
							<li><a href="about">About</a></li>
						</ul>
			</div>
			</div>
			
			
			
			<div class="clearfix"> </div>
			
		
	</div>
	<div class="footer_w3ls">
		
					<div class="footer_bottom1">
						<p>© 2018 Machined. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
					</div>
		
	</div>
	<!-- //footer -->
	
<script src="<?php echo $this->baseURL ?>Assets/js/jquery.min.js"></script>	
<script src="<?php echo $this->baseURL ?>Assets/js/bootstrap.min.js"></script>
<script  src="<?php echo $this->baseURL ?>Assets/js/move-top.js"></script>
<script  src="<?php echo $this->baseURL ?>Assets/js/easing.js"></script>
<script  src="<?php echo $this->baseURL ?>Assets/js/SmoothScroll.min.js"></script>	
	
<!-- Slider Script-->
<script src="<?php echo $this->baseURL ?>Assets/js/rgbSlide.min.js"></script>
<script src="<?php echo $this->baseURL ?>Assets/js/mainScript.js"></script>
<!--/ Slider Script-->					
	<!--tabs-->	
<script src="<?php echo $this->baseURL ?>Assets/js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- Testimonials-->
<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
<!-- /Testimonials-->
<script type="text/javascript" src="<?php echo $this->baseURL ?>Assets/js/simple-lightbox.min.js"></script>
			<script>
				$(function(){
					var gallery = $('.agileinfo-gallery-row a').simpleLightbox({navText:		['&lsaquo;','&rsaquo;']});
				});
			</script> 
<!-- start-smoth-scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
<!--//start-smoth-scrolling -->

</body>
</html>