<!-- footer -->
<div class="footer" id="footer">
		<div class="container">
			<div class="list">
				<div class="col-md-3 wthree_fl">
					<a href="home">IMMERSE</a>
					</div>
					
				<div class="col-md-6 wthree_fc">
					<h6> Sophia Road </h6>
					<h6> 1594 Nicolas </h6>
					<h6> U S A </h6>
					</div>
					
					<div class="col-md-3 wthree_fr">
					<h6>+1 358 649 4885</h6>
					<h6><a href="mailto:service@decorate.com">service@decorate.com</a></h6>
					</div>
				
				
			</div>
		</div>
	</div>
	<!-- //footer -->
<div class="copyright">
		<div class="container">
			<p>© 2018 Immerse. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>

<script src="<?php echo $this->baseURL ?>js/jquery.min.js"></script>
<script src="<?php echo $this->baseURL ?>js/jquery.easing.min.js"></script>
<script src="<?php echo $this->baseURL ?>js/move-top.js"></script>
<script src="<?php echo $this->baseURL ?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->baseURL ?>js/grayscale.js"></script>
<script src="<?php echo $this->baseURL ?>js/SmoothScroll.min.js"></script>
<!-- flexSlider -->
	<script src="<?php echo $this->baseURL ?>js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items :2,
									itemsDesktop : [800,2],
									itemsDesktopSmall : [414,1],
							        lazyLoad : true,
							        autoPlay : true,
							        navigation :true,
									
							        navigationText :  false,
							        pagination : true,
									
							      });
								  
							    });
							    </script>

<!-- //flexSlider -->
 <!-- /gallery -->
    <script src="<?php echo $this->baseURL ?>js/jquery.tools.min.js"></script>
    <script src="<?php echo $this->baseURL ?>js/jquery.mobile.custom.min.js"></script>
    <script src="<?php echo $this->baseURL ?>js/jquery.cm-overlay.js"></script>

    <script>
        $(document).ready(function () {
            $('.cm-overlay').cmOverlay();
        });
    </script>
    <!-- //gallery -->

<!-- Move-to-top-->
<script type="text/javascript">
$(document).ready(function() {
var defaults = {
containerID: 'toTop', // fading element id
containerHoverID: 'toTopHover', // fading element hover id
scrollSpeed: 1200,
easingType: 'linear' 
};
$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<!--/Move-to-top-->


</body>
</html>