<div id="page-wrapper">
	<div class="main-page">


		<div class="grids-section">

			<div class="bottom-table">
				<h2 class="hdg text-center">User Table</h2>
				<button class="btn btn-success"><a href="adduser">Add User</a></button>
				<div class="bs-docs-example">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>FULLNAME</th>
								<th>USERNAME</th>
								<th>EMAIL</th>
								<th>PHONE</th>
								<th>DOB</th>
								<th>GENDER</th>
								<th>HOBBY</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i =0;
							foreach ($viewalluserRes["Data"] as $key => $value) {$i++;?>
							<tr>
								<td><?php echo $i ;?></td>
								<td><?php echo $value->fullname ;?></td>
								<td><?php echo $value->username ;?></td>
								<td><?php echo $value->email ;?></td>
								<td><?php echo $value->phone ;?></td>
								<td><?php echo $value->dob ;?></td>
								<td><?php echo $value->gender ;?></td>
								<td><?php echo $value->hobby ;?></td>
								<td>
									<a href="edit?userid=<?php echo  $value->id; ?>">Edit</a>
									<a href="delete?userid=<?php echo $value->id; ?>">Delete</a>
								</td>
								
							
							</tr>	
						<?php	} ?>
							

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