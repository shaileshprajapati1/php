<div id="page-wrapper">
	<div class="main-page">


		<div class="grids-section">

			<div class="bottom-table">
				<h2 class="hdg text-center">User Table</h2>
				<div class="bs-docs-example">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start Date</th>
								<th>Salary</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Nash</td>
								<td>Software Engineer</td>
								<td>London</td>
								<td>35</td>
								<td>2011/05/03</td>
								<td>$163,500.00</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="copy-section">

	<p>&copy; 2016 Ultra Modern. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
</div>
<!-- Classie -->
<script src="<?php echo $this->baseURL; ?>Assets/admin/js/classie.js"></script>
<script>
	var menuLeft = document.getElementById('cbp-spmenu-s1'),
		showLeftPush = document.getElementById('showLeftPush'),
		body = document.body;

	showLeftPush.onclick = function() {
		classie.toggle(this, 'active');
		classie.toggle(body, 'cbp-spmenu-push-toright');
		classie.toggle(menuLeft, 'cbp-spmenu-open');
		disableOther('showLeftPush');
	};


	function disableOther(button) {
		if (button !== 'showLeftPush') {
			classie.toggle(showLeftPush, 'disabled');
		}
	}
</script>
<!-- Bootstrap Core JavaScript -->

<script type="text/javascript" src="<?php echo $this->baseURL; ?>Assets/admin/js/bootstrap.min.js"></script>
<!--scrolling js-->
<script src="<?php echo $this->baseURL; ?>Assets/admin/js/jquery.nicescroll.js"></script>
<script src="<?php echo $this->baseURL; ?>Assets/admin/js/scripts.js"></script>
<!--//scrolling js-->
</body>

</html>