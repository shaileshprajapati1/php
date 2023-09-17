 <div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mt-4"><i class="fa-solid fa-users"></i>Update User</h1>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="row my-2">
                        <div class="col-6 offset-1 ">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="<?php echo $UpdateByIdRes['Data'][0]->username ?>">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 offset-1 ">
                            <label for="fullname">Fullname</label>
                            <input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo $UpdateByIdRes['Data'][0]->fullname ?>">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 offset-1  ">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $UpdateByIdRes['Data'][0]->email ?>">
                        </div>
                    </div>
                    <!-- <div class="row my-2">
                        <div class="col-6 offset-1  ">
                            <label for="password">password</label>
                            <input class="form-control" type="password" name="password" <?php echo isset($UpdateByIdRes) ? "disabled" : ""; ?> id="password" value="<?php echo $UpdateByIdRes['Data'][0]->password ?? ""; ?>">
                        </div> -->
                    </div>
                    <div class="row my-2">
                        <div class="col-6 offset-1  ">
                            <label for="phone">Phone</label>
                            <input class="form-control" type="tel" name="phone" id="phone" value="<?php echo $UpdateByIdRes['Data'][0]->phone ?>">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 offset-1 ">
                            <label for="Gender">Gender</label><br>

                            <input type="radio" name="gender" <?php if (isset($UpdateByIdRes)) {
                                                                    if ($UpdateByIdRes['Data'][0]->gender == "Male") {
                                                                        echo "checked";
                                                                    }
                                                                }; ?> id="Male" value="Male"><label for="Male">Male</label>
                            <input type="radio" name="gender" <?php if (isset($UpdateByIdRes)) {
                                                                    if ($UpdateByIdRes['Data'][0]->gender == "Female") {
                                                                        echo "checked";
                                                                    }
                                                                }; ?> id="Female" value="Female"><label for="Female">Female</label>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 offset-1  ">
                            <label for="phone">Profile_pic</label>
                            <img src="uploads/<?php echo $UpdateByIdRes['Data'][0]->profile_pic; ?>" width="100px" height="100px" alt="">
                            <input type="file" name="profile_pic" id="profile_pic">
                            <input type="hidden" name="old_profile_pic" id="old_profile_pic" value="<?php echo $UpdateByIdRes['Data'][0]->profile_pic; ?>">
                        </div>
                    </div>


                    <div class="row my-2">
                        <div class="col-6 offset-1 ">
                            <label for="hobby">Hobby</label><br>
                            <?php $HobbyData = explode(",", $UpdateByIdRes['Data'][0]->hobby);
                            // print_r($HobbyData); 
                            // print_r($UpdateByIdRes['Data'][0]->hobby); 
                            ?>
                            <input type="checkbox" name="hobby[]" id="cricket" <?php if (in_array("cricket", $HobbyData)) { echo "checked"; } ?> value="cricket"><label for="cricket">cricket</label>
                            <input type="checkbox" name="hobby[]" id="music" <?php if (in_array("music", $HobbyData)) { echo "checked"; } ?> value="music"><label for="music">music</label>
                            <input type="checkbox" name="hobby[]" id="reading" <?php if (in_array("reading", $HobbyData)) { echo "checked"; } ?> value="reading"><label for="reading">reading</label>

                        </div>
                        <div class="row my-2">
                            <div class="col-6 offset-1 ">
                                <label for="city" class="form-label">City</label>
                                <select id="city" class="form-select">
                                    <option selected>Select city</option>
                                    <?php foreach ($CityData['Data'] as $key => $value) {  ?>

                                        <option <?php if (isset($UpdateByIdRes)) {
                                                    if ($UpdateByIdRes['Data'][0]->city == $value->cid) {
                                                        echo "selected";
                                                    }
                                                }; ?> value="<?php echo $value->cid; ?>"><?php echo $value->name ; ?></option>
                                    <?php   } ?>
                                </select>


                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6 offset-1 ">
                                <label for="city" class="form-label">states</label>
                                <select id="city" class="form-select">
                                    <option selected>Select city</option>
                                    <?php foreach ($StatesData['Data'] as $key => $value) {  ?>

                                        <option <?php if (isset($UpdateByIdRes)) {
                                                    if ($UpdateByIdRes['Data'][0]->state_id == $value->sid) {
                                                        echo "selected";
                                                    }
                                                }; ?> value="<?php echo $value->sid; ?>"><?php echo $value->name ; ?></option>
                                    <?php   } ?>
                                </select>


                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6 offset-1 ">
                                <label for="city" class="form-label">country</label>
                                <select id="city" class="form-select">
                                    <option selected>Select city</option>
                                    <?php foreach ($CountryData['Data'] as $key => $value) {  ?>

                                        <option <?php if (isset($UpdateByIdRes)) {
                                                    if ($UpdateByIdRes['Data'][0]->country_id == $value->country_id) {
                                                        echo "selected";
                                                    }
                                                }; ?> value="<?php echo $value->country_id ; ?>"><?php echo $value->country_name ; ?></option>
                                    <?php   } ?>
                                </select>


                            </div>
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-6 offset-1 ">
                            <input type="submit" class="btn btn-success" name="Update" value="Update">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>