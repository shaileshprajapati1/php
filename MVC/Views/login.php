<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="<?php echo $this->baseURL ?>register/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo $this->baseURL ?>register/css/owl.carousel.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $this->baseURL ?>register/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo $this->baseURL ?>register/css/style.css">

    <title>Login Form</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('<?php echo $this->baseURL ?>register/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5 "><a href="home">Home</a>

                        <h3 class="mb-5 text-center">Login</h3>
                        <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                        <form action="#" method="post">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="username">username</label>
                                        <input type="text" class="form-control" placeholder="Enter username " name="username" id="username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter password " name="password" id="password" required>
                                    </div>
                                </div>
                            </div>


                            <input  type="submit" value="Login" name="login" class="btn px-5 btn-primary my-5">


                            
                        </form>
                        <a href="register" class="text-center" >Click here to Create Account</a>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="<?php echo $this->baseURL ?>register/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $this->baseURL ?>register/js/popper.min.js"></script>
    <script src="<?php echo $this->baseURL ?>register/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->baseURL ?>register/js/main.js"></script>
</body>

</html>