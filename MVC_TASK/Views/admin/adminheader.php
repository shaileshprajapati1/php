<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
// echo "<pre>";
// print_r($_SESSION['userdata']);
// echo "</pre>";
if (!isset($_SESSION['userdata'])) {
    header("location:login");
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Admin Panel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->baseURL; ?>admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="<?php echo $this->baseURL; ?>admin/css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="<?php echo $this->baseURL; ?>admin/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="<?php echo $this->baseURL; ?>admin/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $this->baseURL; ?>admin/js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="<?php echo $this->baseURL; ?>admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo $this->baseURL; ?>admin/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- chart -->
    <script src="<?php echo $this->baseURL; ?>admin/js/Chart.js"></script>
    <!-- //chart -->
    <!--Calender-->
    <link rel="stylesheet" href="<?php echo $this->baseURL; ?>admin/css/clndr.css" type="text/css" />
    <script src="<?php echo $this->baseURL; ?>admin/js/underscore-min.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseURL; ?>js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseURL; ?>admin/js/clndr.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseURL; ?>admin/js/site.js" type="text/javascript"></script>
    <!--End Calender-->
    <!-- Metis Menu -->
    <script src="<?php echo $this->baseURL; ?>admin/js/metisMenu.min.js"></script>
    <script src="<?php echo $this->baseURL; ?>admin/js/custom.js"></script>
    <link href="<?php echo $this->baseURL; ?>admin/css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
                <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="admin" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="Allusers"><i class="fa fa-user nav_icon"></i>All Users</a>
                        </li>
                        <li>
                            <a href="Allproduct"><i class="fa fa-television nav_icon"></i>All Product</a>
                        </li>


                        <li>
                            <!-- <a href="#"><i class="fa fa-cogs nav_icon"></i>Components </a> -->

                            <!-- <ul class="dropdown-menu drp-mnu">
								<li>
									<a href="grids.html">Grid System</a>
								</li>
								<li>
									<a href="media.html">Media Objects</a>
								</li>
							</ul> -->
                            <!-- /nav-second-level -->
                        </li>



                    </ul>
                    <!-- //sidebar-collapse -->
                </nav>
            </div>
        </div>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <div class="sticky-header header-section ">
            <div class="header-left">
                <!--toggle button start-->
                <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                <!--toggle button end-->
                <!--logo -->
                <div class="logo">
                    <a href="admin">
                        <h1>Product</h1>
                        <span>AdminPanel</span>
                    </a>
                </div>
                <!--//logo-->
                <!--search-box-->
                <!-- <div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div> -->
                <!--//end-search-box-->
                <div class="clearfix"> </div>
            </div>
            <div class="header-right">
                <div class="profile_details_left"><!--notifications of menu start -->
                    <ul class="nofitications-dropdown">
                        <?php echo $date = date('m/d/Y h:i:s a', time()); ?>


                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <!--notification menu end -->
                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><img src="<?php echo $this->baseURL; ?>admin/images/shailesh.jpg" width="30px" alt=""> </span>
                                    <div class="user-name">
                                        <h3>Hello <span><?php echo $_SESSION['userdata'][0]->name; ?></span></h2>
                                            <?php
                                            // echo "<pre>";
                                            // print_r($_SESSION['userdata'][0]->name);
                                            // echo "</pre>";
                                            ?>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <!-- <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>  -->
                                <!-- <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>  -->
                                <li> <a href="logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //header-ends -->