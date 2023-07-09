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

    <title>Edit User</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('<?php echo $this->baseURL ?>register/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5 ">

                        <h3 class="mb-5 text-center">User Data</h3>
                        <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                        <form action="#" method="post">
                        <?php
                            $i = 0;
                            foreach ($EditRes['Data'] as $key => $value) { ?>
                
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" class="form-control" value="<?php echo $value->fullname ;?>" name="fullname" id="fullname" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="username">username</label>
                                        <input type="text" class="form-control" value="<?php echo $value->username ;?>"  name="username" id="username" required>
                                    </div>
                                </div>
                                <!-- <div class="row"> -->
                                    <div class="col-md-12">
                                        <div class="form-group first">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" value="<?php echo $value->email ;?>" name="email" id="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group first">
                                            <label for="Phone">Phone Number</label>
                                            <input type="text" class="form-control" value="<?php echo $value->phone ;?>"  name="phone" id="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group first">
                                            <label for="dob">DOB</label>
                                            <input type="date" class="form-control" value="<?php echo $value->dob ;?>" name="dob" id="dob" required>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="d-flex mb-5 mt-4 align-items-center">
                                    <div class="d-flex align-items-center">
                                        <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                                            <input type="checkbox" checked="checked" />
                                            <div class="control__indicator"></div>
                                        </label>
                                    </div>
                                </div>
                              
                                <input type="submit" value="Update" name="update" class="btn px-5 btn-secondary">

                                
                                <?php } ?>
                        </form>
                        
                     
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