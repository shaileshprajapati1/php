<head>
    <style>
        /* all */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            --main-blue: #71b7e6;
            --main-purple: #9b59b6;
            --main-grey: #ccc;
            --sub-grey: #d9d9d9;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            /*center vertically */
            align-items: center;
            /* center horizontally */
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            padding: 10px;
        }

        /* container and form */
        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            text-align: center;
        }

        .container .title::before {
            content: "";
            position: absolute;
            height: 3.5px;
            width: 30px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            left: 245;
            bottom: 0;
        }

        .container form .user__details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        /* inside the form user details */
        form .user__details .input__box {
            width: calc(100% / 2 - 20px);
            margin-bottom: 15px;
        }

        .user__details .input__box .details {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .user__details .input__box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid var(--main-grey);
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user__details .input__box input:focus,
        .user__details .input__box input:valid {
            border-color: var(--main-purple);
        }

        /* inside the form gender details */

        form .gender__details .gender__title {
            font-size: 20px;
            font-weight: 500;
        }

        form .gender__details .category {
            display: flex;
            width: 80%;
            margin: 15px 0;
            /* justify-content: space-between; */
        }

        .gender__details .category label {
            display: flex;
            align-items: center;
        }

        .gender__details .category .dot {
            height: 18px;
            width: 18px;
            background: var(--sub-grey);
            border-radius: 50%;
            margin: 10px;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category .one,
        #dot-2:checked~.category .two {
            border-color: var(--sub-grey);
            background: var(--main-purple);
        }

        /* form input[type="radio"] {
            display: none;
        } */

        /* submit button */
        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            transition: all 0.3s ease;
        }

        form .button input:hover {
            background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
        }

        @media only screen and (max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user__details .input__box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .gender__details .category {
                width: 100%;
            }

            .container form .user__details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user__details::-webkit-scrollbar {
                width: 0;
            }


        }
    </style>
</head>

<div class="container">
    <!-- <a href="home">Home</a> -->
    <div class="title">User Form </div>
    <form action="#" method="post">
        <div class="user__details">
            <div class="input__box">
                <span class="details">Full Name</span>
                <input type="text" placeholder="Enter FullName" name="fullname" id="fullname" value="<?php echo $viewuser['data'][0]->fullname; ?>" required>
            </div>
            <div class="input__box">
                <span class="details">Username</span>
                <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php echo $viewuser['data'][0]->username; ?>" required>
            </div>
            <div class="input__box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter Email Id" name="email" id="email" value="<?php echo $viewuser['data'][0]->email; ?>" required>
            </div>
            <div class="input__box">
                <span class="details">Phone Number</span>
                <input type="tel" placeholder="Enter Phonenumber" name="phone" id="phone" value="<?php echo $viewuser['data'][0]->phone; ?>" required>
            </div>

            <div class="input__box">
                <span class="details">Password</span>

                <input type="password" placeholder="********" name="password" id="password" <?php echo isset($viewuser) ? "disabled" : ""; ?> value="<?php echo $viewuser['data'][0]->password; ?>" required>
            </div>

            <div class="input__box">
                <span class="details">BirthDay</span>
                <input type="date" placeholder="Enter Phonenumber" name="dob" id="dob" value="<?php echo $viewuser['data'][0]->dob; ?>" required>
            </div>


        </div>
        <div class="gender__details">
            <div class="gender__title">Gender</div>
            <div class="radio">
                <div class="category">

                    <input type="radio" name="gender" id="Male" <?php if (isset($viewuser)) {
                                                                    if ($viewuser['data'][0]->gender == "Male") {
                                                                        echo "checked";
                                                                    }
                                                                } ?> value="Male"><label for="Male">Male</label>
                    <input type="radio" name="gender" id="Female" <?php if (isset($viewuser)) {
                                                                        if ($viewuser['data'][0]->gender == "Female") {
                                                                            echo "checked";
                                                                        }
                                                                    } ?> value="Female"><label for="Female">Female</label>

                </div>
            </div>
        </div>
        <div class="gender__details">
            <div class="gender__title">Hobby</div>
            <div class="checkbox">
                <div class="category">
                    <?php $HobbyData = explode(",", $viewuser['data'][0]->hobby);
                    // echo "<pre>";
                    // print_r($HobbyData);
                    // echo "</pre>" 
                    ?>
                    <input type="checkbox" name="hobby[]" id="Cricket" <?php if (isset($viewuser)) {
                                                                            if (in_array("Cricket", $HobbyData)) {
                                                                                echo "checked";
                                                                            }
                                                                        }
                                                                        ?> value="Cricket"><label for="Cricket">Cricket</label>
                    <input type="checkbox" name="hobby[]" id="Music" <?php if (isset($viewuser)) {
                                                                            if (in_array("Music", $HobbyData)) {
                                                                                echo "checked";
                                                                            }
                                                                        }
                                                                        ?> value="Music"><label for="Music">Music</label>
                    <input type="checkbox" name="hobby[]" id="Reading" <?php if (isset($viewuser)) {
                                                                            if (in_array("Reading", $HobbyData)) {
                                                                                echo "checked";
                                                                            }
                                                                        }
                                                                        ?> value="Reading"><label for="Reading">Reading</label>
                    <input type="checkbox" name="hobby[]" id="Watching Movies" <?php if (isset($viewuser)) {
                                                                                    if (in_array("Watching Movies", $HobbyData)) {
                                                                                        echo "checked";
                                                                                    }
                                                                                }
                                                                                ?> value="Watching Movies"><label for="Watching Movies">Watching Movies</label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="gender__title">City</div>
            <select id="inputState" class="form-select">
                <option selected>Select city</option>
                <?php foreach ($CityData['data'] as $key => $value) { ?>
                   
               <option <?php if(isset($viewuser)){
                if($viewuser['data'][0]->cityid == $value->cityid){
                    echo "selected";
                }
               } ?> value="<?php echo $value->cityid ?>" ><?php echo $value->city ?></option>
        <?php  }  ?>
            </select>
        </div>

        <div class="button">
            <input type="submit" name="update" value="Update">
        </div>
    </form>
</div>