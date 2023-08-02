<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>Student registration form</title>
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
</head>

<body>
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="<?php echo $this->baseURL; ?>assets/images/c3.jpg" alt="Sample photo" class="img-fluid" width="1000px" />

                            </div>
                            <div class="col-xl-6"><a href="home">Home</a>
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">Student registration form</h3>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="fullname">Full name</label>
                                                    <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input type="tel" minlength="10" maxlength="10" id="phone" name="phone" class="form-control form-control-lg" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                                </div>
                                            </div>
                                        </div>



                                        <!-- <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example8">Address</label>
                                        <input type="text" id="form3Example8" class="form-control form-control-lg" />
                                    </div> -->

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Gender: </h6>


                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other" />
                                                <label class="form-check-label" for="otherGender">Other</label>
                                            </div>

                                        </div>

                                        <div class="row1">
                                            <div class="col-md-4 mb-4">
                                                    <label for="">Country</label>
                                                <select class="select" name="country" onchange="loadstatebycountry(this)" id="country">
                                                    <option value=""> Select Country</option>

                                                </select>

                                            </div>
                                            <div class="col-md-4 mb-4">
                                            <label for="">State</label>

                                                <select class="select" onchange="loadcitybystate(this)" name="state" id="state">
                                                    <option value="" >Select State</option>

                                                </select>

                                            </div>
                                            <div class="col-md-4 mb-4">
                                            <label for="">City</label>

                                                <select class="select" name="city" id="city">
                                                    <option value="" >Select City</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="dob">DOB</label>
                                            <input type="date" name="dob" id="dob" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example9">Hobby</label><br>
                                            <input type="checkbox" name="hobby[]" id="cricket" value="cricket"><label for="cricket">cricket</label>
                                            <input type="checkbox" name="hobby[]" id="reading" value="reading"><label for="reading">reading</label>
                                            <input type="checkbox" name="hobby[]" id="music" value="music"><label for="music">music</label>
                                            <input type="checkbox" name="hobby[]" id="watching movies" value="watching movies"><label for="watching movies">watching movies</label>
                                        </div>

                                        <!-- <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example90">Pincode</label>
                                        <input type="text" id="form3Example90" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example99">Course</label>
                                        <input type="text" id="form3Example99" class="form-control form-control-lg" />
                                    </div>

                                     -->

                                        <div class="text-center">
                                            <input type="submit" name="register" class="btn btn-success" value="Submit Form">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function loadcountry() {
            fetch("http://localhost/php/php/MVC3/allcountry").then((res) => res.json()).then((result) => {
                console.log(result);
               let HTMLRes = `<option value=""> Select Country</option>`
                result.Data.forEach(data  => {
                   console.log(data);
                   HTMLRes += `<option value=${data.country_id}> ${data.country_name}</option>`
                });
                console.log(HTMLRes);
                document.getElementById("country").innerHTML=HTMLRes
            });
        }
        loadcountry();
    
        function loadstatebycountry(id){
            // console.log(id.value);
            fetch("http://localhost/php/php/MVC3/allstates?countryid="+id.value).then((res)=>res.json()).then((result)=> {
                console.log(result);
                let htmlres = ` <option value="" >Select State</option>`
                result.Data.forEach(data => {
                    console.log(data);
                    htmlres += ` <option value=${data.sid} >${data.name}</option>`
                })
                console.log(htmlres);
                document.getElementById("state").innerHTML=htmlres
            })

       }
    loadstatebycountry()

    function  loadcitybystate(id){
        // console.log(id.value);
        fetch("http://localhost/php/php/MVC3/allcities?stateid="+id.value).then((res)=>res.json()).then((result)=>{
            console.log(result);
            let htmlres = `<option value="" >Select City</option>`
            result.Data.forEach(data=>{
                console.log(data);
                htmlres+= `<option value=${data.cid} >${data.name}</option>`
            })
            console.log(htmlres);
            document.getElementById("city").innerHTML=htmlres
        });

    }
loadcitybystate()
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>