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
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

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
                        <form onsubmit='return formSubmit(this)' action="#" method="post" enctype="multipart/form-data" id="loginform">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" class="form-control" placeholder="Enter FirstName" name="fullname" id="fullname" required>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter LastName" name="lname" id="lname">
                                    </div>
                                </div> -->
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
                                        <input type="date" class="form-control" placeholder="01-01-0000" name="dob" id="dob">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" minlength="3" maxlength="8" placeholder="Your Password" name="password" id="password">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="re-password">Re-type Password</label>
                                        <input type="password" class="form-control" minlength="8" maxlength="8" placeholder="Your Password" name="re-password" id="re-password">
                                    </div>
                                </div> -->
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
                                <label for="profile_pic">profile_pic</label>
                                <input type="file" accept="image/*" id="profilepic" onchange="loadFile(event)">
                                <img width="100px" id="output" />
                                <input type="hidden"  name="profile_pic" id="profile_pic" value="">

                                <script>
                                    var loadFile = function(event) {
                                        // console.log(event.target.file[0]);
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        let photo = event.target.files[0];
                                        let formData = new FormData();
                                        formData.append('profile_pic', photo);
                                        fetch("http://localhost/PHP/php/API/uploadimage", {
                                                method: 'POST',
                                                body: formData }).then((response) => response.json()).then((data) => {
                                                console.log(data);
                                                
                                                document.getElementById("profile_pic").values = data
                                            })
                                            
                                    };
                                </script>
                            </div>
                            <div>
                                <label for="country">Country</label>
                                <select name="country" onchange="loadstates(this)" class="form-control" id="country">
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                            <div>
                                <label for="states">States</label>
                                <select name="states" onchange="loadcities(this)" class="form-control" id="states">
                                    <option value="">Select states</option>
                                </select>
                            </div>
                            <div>
                                <label for="city">city</label>
                                <select name="city" class="form-control" id="city">
                                    <option value="">Select city</option>
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


                            <input type="submit" id="register" value="Register" name="register" class="btn px-5 btn-primary">



                        </form>


                    </div>
                </div>
            </div>
        </div>


        <script>
            function loadcountries() {
                fetch("http://localhost/PHP/php/API/Allcountries").then((res) => res.json()).then((response) => {
                    console.log(response);
                    htmloption = `<option value = "">Select Country</option>`
                    response.Data.forEach(data => {
                        console.log(data);
                        htmloption += `<option value =${data.country_id}>${data.country_name}</option>`
                    });
                    console.log(htmloption);
                    document.getElementById("country").innerHTML = htmloption
                })
            }
            loadcountries()

            function loadstates(id) {
                // console.log("country id is",id.value);
                fetch("http://localhost/php/php/API/allstates?countryid=" + id.value).then((res) => res.json()).then((response) => {
                    console.log(response);
                    htmloption = `<option value = "">Select states</option>`
                    response.Data.forEach(data => {
                        console.log(data);
                        htmloption += `<option value = ${data.sid}>${data.name}</option>`
                    });
                    console.log(htmloption);
                    document.getElementById("states").innerHTML = htmloption

                });

            }
            loadstates()

            function loadcities(id) {
                // console.log(id.value);
                fetch("http://localhost/php/php/API/allcities?statesid=" + id.value).then((res) => res.json()).then((response) => {
                    console.log(response);
                    htmloption = `<option value="">Select city</option>`
                    response.Data.forEach(data => {
                        console.log(data);
                        htmloption += `<option value="${data.cid}">${data.name}</option>`
                    });
                    console.log(htmloption);
                    document.getElementById("city").innerHTML = htmloption
                });
            }
            loadcities()

            function formSubmit() {
                event.preventDefault();
                // formdata = $("#loginform").serializeArray()
                // console.log(formdata);
                // var result = {};
                // $.each($('#loginform').serializeArray(), function() {
                //     result[this.name] = this.value;
                // });
                // console.log(result);
                var values = {};
                $.each($('#loginform').serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                Hobbystring = ""
                $('input[type="checkbox"]:checked').each(function() {
                    // console.log(this.value);
                    Hobbystring += this.value + ",";


                    // values["hobby"] = $(this.values).prop('checked')
                    // if ($.inArray(this.name, values) === -1) {
                    // }
                });
                // console.log(Hobbystring);
                Hobbystr = Hobbystring.substring(0, Hobbystring.length - 4);
                values['hobby'] = Hobbystr;
                delete values['hobby[]'];
                delete values['country'];
                delete values['states'];
                fetch("http://localhost/PHP/php/API/register", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(values)


                }).then((res) => res.json()).then((response) => {
                    console.log(response);

                })



                // console.log(values)



            }
        </script>




    </div>



    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/popper.min.js"></script>
    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/bootstrap.min.js"></script>
    <script src="http://localhost/PHP/php/AccessAPI/Assest/register/js/main.js"></script>



</body>

</html>