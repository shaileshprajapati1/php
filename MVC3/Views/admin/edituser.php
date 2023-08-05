<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<div id="page-wrapper">
    <div class="main-page signup-page">
        <h3 class="title1">Update User</h3>

        <div class="sign-up-row widget-shadow">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="sign-u">
                    <label class="sign-up1" for="fullname">Full name</label>
                    <input type="text" id="fullname" value="<?php echo $ViewUserRes["Data"]["0"]->fullname; ?>" name="fullname" class="sign-up2" />
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <label class="sign-up1" for="username">Username</label>
                    <input type="text" id="username" value="<?php echo $ViewUserRes["Data"]["0"]->username; ?>" name="username" class="sign-up2" />
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <label class="sign-up1" for="email">Email</label>
                    <input type="email" id="email" value="<?php echo $ViewUserRes["Data"]["0"]->email; ?>" name="email" class="sign-up2" />
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <label class="sign-up1" for="phone">phone</label>
                    <input type="tel" id="phone" value="<?php echo $ViewUserRes["Data"]["0"]->phone; ?>" name="phone" class="sign-up2" />
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <label class="sign-up1" for="password">Password</label>
                    
                    <input type="password" id="password" <?php echo isset($ViewUserRes)?"disabled":"" ?>  value="<?php echo $ViewUserRes["Data"]["0"]->password ?? ""; ?>" name="password" class="sign-up2" />
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <h6 class="mb-0 me-4">Gender: </h6>
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender" <?php if ($ViewUserRes["Data"][0]->gender == "Male") { echo "Checked"; } ?> value="Male" />
                        <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" <?php if ($ViewUserRes["Data"][0]->gender == "Female") { echo "Checked"; } ?> value="Female" />
                        <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="gender" id="otherGender" <?php if ($ViewUserRes["Data"][0]->gender == "Other") { echo "Checked"; } ?> value="Other" />
                        <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <div class="col-md-4 mb-4">
                        <label for="">Country</label>
                        <select class="select" name="country" onchange="loadstatebycountry(this)" id="country">
                            <option value=""> Select Country</option>

                        </select>

                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">State</label>

                        <select class="select" onchange="loadcitybystate(this)" name="state" id="state">
                            <option value="">Select State</option>

                        </select>

                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">City</label>

                        <select class="select" name="city"  id="city">
                            <option value="">Select City</option>
                           
                        </select>

                    </div>
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <label class="sign-up1" for="dob">DOB</label>
                    <input type="date" id="dob" value="<?php echo $ViewUserRes["Data"]["0"]->dob ;?>" name="dob" class="sign-up2" />
                </div>
                <div class="clearfix"> </div><br>
                <div class="sign-u">
                    <?php 
                    // echo "<pre>";
                    $HobbyData = explode(",",$ViewUserRes["Data"][0]->hobby);
                    // print_r($HobbyData) ;
                    
                    // echo "</pre>";
                    ?>

                    <label class="form-label" for="form3Example9">Hobby</label><br>
                    <input type="checkbox" name="hobby[]" id="cricket" <?php if(in_array("cricket",$HobbyData)){echo "checked";}  ?> value="cricket"><label for="cricket">cricket</label>
                    <input type="checkbox" name="hobby[]" id="reading" <?php if(in_array("reading",$HobbyData)){echo "checked";}  ?> value="reading"><label for="reading">reading</label>
                    <input type="checkbox" name="hobby[]" id="music" <?php if(in_array("music",$HobbyData)){echo "checked";}  ?> value="music"><label for="music">music</label>
                    <input type="checkbox" name="hobby[]" id="watching movies" <?php if(in_array("watching movies",$HobbyData)){echo "checked";}  ?> value="watching movies"><label for="watching movies">watching movies</label>
                </div>
                <div class="clearfix"> </div><br>
                <div class="text-center">
                    <input type="submit" name="update" class="btn btn-success" value="Update">
                </div>
            </form>


        </div>
    </div>
</div>
<script>
    function loadcountry() {
        fetch("http://localhost/php/php/MVC3/allcountry").then((res) => res.json()).then((result) => {
            console.log(result);
            let HTMLRes = `<option value=""> Select Country</option>`
            result.Data.forEach(data => {
                console.log(data);
                HTMLRes += `<option value=${data.country_id}> ${data.country_name}</option>`
            });
            console.log(HTMLRes);
            document.getElementById("country").innerHTML = HTMLRes
        });
    }
    loadcountry();

    function loadstatebycountry(id) {
        // console.log(id.value);
        fetch("http://localhost/php/php/MVC3/allstates?countryid=" + id.value).then((res) => res.json()).then((result) => {
            console.log(result);
            let htmlres = ` <option value="" >Select State</option>`
            result.Data.forEach(data => {
                console.log(data);
                htmlres += ` <option value=${data.sid} >${data.name}</option>`
            })
            console.log(htmlres);
            document.getElementById("state").innerHTML = htmlres
        })

    }
    loadstatebycountry()

    function loadcitybystate(id) {
        // console.log(id.value);
        fetch("http://localhost/php/php/MVC3/allcities?stateid=" + id.value).then((res) => res.json()).then((result) => {
            console.log(result);
            let htmlres = `<option value="" >Select City</option>`
            result.Data.forEach(data => {
                console.log(data);
                htmlres += `<option value=${data.cid} >${data.name}</option>`
            })
            console.log(htmlres);
            document.getElementById("city").innerHTML = htmlres
        });

    }
    loadcitybystate()
</script>