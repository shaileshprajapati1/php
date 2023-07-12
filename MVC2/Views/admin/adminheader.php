<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Ultra Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
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
    <link href="<?php echo $this->baseURL; ?>Assets/admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="<?php echo $this->baseURL; ?>Assets/admin/css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="<?php echo $this->baseURL; ?>Assets/admin/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--skycons-icons-->
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/skycons.js"></script>
    <!--//skycons-icons-->

    <!-- js-->
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/bootstrap.js"></script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Comfortaa:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!-- Metis Menu -->
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/metisMenu.min.js"></script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/custom.js"></script>
    <link href="<?php echo $this->baseURL; ?>Assets/admin/css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
    <link href="<?php echo $this->baseURL; ?>Assets/admin/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/jquery.sparkline.min.js"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        $(function() {
            /** This code runs when everything has been loaded on the page */
            /* Inline sparklines take their values from the contents of the tag */
            $('.inlinesparkline').sparkline();

            /* Sparklines can also take their values from the first argument passed to the sparkline() function */
            var myvalues = [10, 8, 5, 7, 4, 4, 1];
            $('.dynamicsparkline').sparkline(myvalues);

            /* The second argument gives options such as specifying you want a bar chart11 */
            $('.dynamicbar').sparkline(myvalues, {
                type: 'bar',
                barColor: '#fff'
            });

            /* Use 'html' instead of an array of values to pass options to a sparkline with data in the tag */
            $('.inlinebar').sparkline('html', {
                type: 'bar',
                barColor: '#fff'
            });

        });
        /* ]]> */
    </script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/Chart.js"></script>

    <!--pie-chart--->
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/pie-chart.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#demo-pie-1').pieChart({
                barColor: '#68b828',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 10,
                onStep: function(from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#7c38bc',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 10,
                onStep: function(from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#0e62c7',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 10,
                onStep: function(from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });
    </script>
    <!--Calender-->
    <link rel="stylesheet" href="<?php echo $this->baseURL; ?>Assets/admin/css/clndr.css" type="text/css" />
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/underscore-min.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/clndr.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseURL; ?>Assets/admin/js/site.js" type="text/javascript"></script>
    <!--End Calender-->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <div class="sidebar" role="navigation">
            <div class="navbar-collapse">
                <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
                    <div class="scrollbar scrollbar1">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="admin" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users" aria-hidden="true"></i>Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="adduser">Add User</a>
                                    </li>
                                    <li>
                                        <a href="viewalluser">View All User</a>
                                    </li>
                                </ul>
                                <!-- /nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- //sidebar-collapse -->
                </nav>
            </div>
        </div>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <div class="sticky-header header-section ">
            <div class="header-left">
                <!--logo -->
                <div class="logo">
                    <a href="admin">
                        <h1>Ultra Modern</h1>
                    </a>
                </div>
                <!--//logo-->
                <div class="user-right">
                    <div class="profile_details_left"><!--notifications of menu start -->
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">
                                            <span class="prfil-img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/a.png" alt=""> </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                                        <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                                        <li> <a href="login.html"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="profile_medile"><!--notifications of menu start -->
                <ul class="nofitications-dropdown">
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
                        <ul class="dropdown-menu anti-dropdown-menu">
                            <li>
                                <div class="notification_header">
                                    <h3>You have 3 new messages</h3>
                                </div>
                            </li>
                            <li><a href="#">
                                    <div class="user_img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/1.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li class="odd"><a href="#">
                                    <div class="user_img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/2.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li><a href="#">
                                    <div class="user_img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/3.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li>
                                <div class="notification_bottom">
                                    <a href="#">See all messages</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                        <ul class="dropdown-menu anti-dropdown-menu">
                            <li>
                                <div class="notification_header">
                                    <h3>You have 3 new notification</h3>
                                </div>
                            </li>
                            <li><a href="#">
                                    <div class="user_img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/2.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li class="odd"><a href="#">
                                    <div class="user_img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/1.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li><a href="#">
                                    <div class="user_img"><img src="<?php echo $this->baseURL ;?>Assets/admin/images/3.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li>
                                <div class="notification_bottom">
                                    <a href="#">See all notifications</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <!--toggle button start-->
                <div class="search-box">
                    <form class="input">
                        <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31">
                    </form>
                </div>
                <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                <div class="clearfix"> </div>
                <!--toggle button end-->
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //header-ends -->