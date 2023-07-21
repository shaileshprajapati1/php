<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="http://localhost/PHP/php/AccessAPI/Assest/register/fonts/icomoon/style.css">

    <link rel="stylesheet" href="http://localhost/PHP/php/AccessAPI/Assest/register/css/owl.carousel.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/PHP/php/AccessAPI/Assest/register/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="http://localhost/PHP/php/AccessAPI/Assest/register/css/style.css">

    <title>Rigster Form</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('http://localhost/PHP/php/AccessAPI/Assest/register/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5 "><a href="home">Home</a>

                        <h3 class="mb-5 text-center">Register</h3>
                        <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                        <form action="#" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter FirstName" name="fname" id="fname" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter LastName" name="lname" id="lname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="username">username</label>
                                        <input type="text" class="form-control" placeholder="Enter username " name="username" id="username" required>
                                    </div>
                                </div>
                                <!-- <div class="row"> -->
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" placeholder="Enter Email Id" name="email" id="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="Phone">Phone Number</label>
                                        <input type="text" class="form-control" minlength="10" maxlength="10" placeholder="Enter PhoneNo" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" placeholder="01-01-0000" name="dob" id="dob" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" minlength="8" maxlength="8" placeholder="Your Password" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="re-password">Re-type Password</label>
                                        <input type="password" class="form-control" minlength="8" maxlength="8" placeholder="Your Password" name="re-password" id="re-password" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="gender">Gedner</label><br>
                                <input type="radio" name="gender" id="Male" value="Male"><label for="Male">Male</label>
                                <input type="radio" name="gender" id="Female" value="Female"><label for="Female">Female</label>
                            </div>
                            <div>
                                <label for="hobby">Hobby</label><br>
                                <input type="checkbox" name="hobby[]" id="cricket" value="cricket"><label for="cricket">cricket</label>
                                <input type="checkbox" name="hobby[]" id="music" value="music"><label for="music">music</label>
                                <input type="checkbox" name="hobby[]" id="reading" value="reading"><label for="reading">reading</label>

                            </div>
                            <div>
                                <label for="password">profile_pic</label>
                                <input type="file" class="form-control" name="profile_pic" id="">
                            </div>
                            <div>
                                <label for="password">Country</label>
                                <select name="country" class="form-control" id="country">
                                    <option>Select Country</option>
                                </select>
                            </div>



                            <div class="d-flex mb-5 mt-4 align-items-center">
                                <div class="d-flex align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                            </div>


                            <input type="submit" value="Register" name="register" class="btn px-5 btn-primary">



                        </form>


                    </div>
                </div>
            </div>
        </div>


        <script>
           function loadcountries(){
            fetch("http://localhost/PHP/php/API/Allcountries").then((res)=>res.json()).then((response)=>{
                console.log(response);
                htmloption = `<option>Select Country</option>`
                response.Data.forEach(data => {
                    console.log(data);
                    htmloption += `<option>${data.country_name}</option>` 
                });
                console.log(htmloption);
                document.getElementById("country").innerHTML=htmloption
            })
           }
           loadcountries()
        </script>




    </div>



    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/popper.min.js"></script>
    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/bootstrap.min.js"></script>
    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/main.js"></script>



</body>

</html>