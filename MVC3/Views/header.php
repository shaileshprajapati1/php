<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Studious - Education Category Responsive Website Template - Home : W3Layouts</title>
    <!-- google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="<?php echo $this->baseURL; ?>assets/css/style-starter.css">
</head>

<body>
    <!-- top header -->
    <section class="w3l-top-header">
        <div class="container-fluid">
            <div class="top-content-w3ls d-flex align-items-center justify-content-between">
                <div class="top-headers">
                    <ul>
                        <li>
                            <a href="#help" class="d-sm-block d-none">Have any question ?</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i><a href="tel:+1(21) 234 4567">+1(21) 234 4567</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i><a href="mailto:mail@example.com">mail@example.com</a>
                        </li>
                    </ul>
                </div>
                <div class="top-headers top-headers-2">
                    <ul>
                        <li>
                            <a href="#facebook"><span class="fa fa-facebook"></span></a>
                        </li>
                        <li>
                            <a href="#twitter"><span class="fa fa-twitter"></span></a>
                        </li>
                        <li>
                            <a href="#instagram"><span class="fa fa-instagram"></span></a>
                        </li>
                        <li class="mr-0">
                            <a href="#linkedin"><span class="fa fa-linkedin"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- //top header -->
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">
                <h1>
                    <a class="navbar-brand d-flex align-items-center" href="home">
                        <img src="<?php echo $this->baseURL; ?>assets/images/logo.png" alt="" class="mr-1" />Studious</a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register">Sign Up</a>
                        </li>
                        <?php
                        if (isset($_SESSION['userdata'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout">Logout</a>
                            </li>

                        <?php  } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login">Login</a>
                            </li>

                        <?php   }
                        ?>
                        <!-- search button -->
                        <div class="search-right ml-lg-3">
                            <form action="#search" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Enter Keyword" name="search" required="required" autofocus="" class="search-popup">
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- //search button -->
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->