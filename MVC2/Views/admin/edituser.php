<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Add User</title>

</head>

<body>
    <main>
        <form  method="post">
            <h1>Add User</h1>
            <div>
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" id="fullname" value="<?php echo $UpdateById['Data'][0]->fullname; ?>" >
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo $UpdateById['Data'][0]->username; ?>" >
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $UpdateById['Data'][0]->email; ?>" >
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="tel" minlength="10" maxlength="10" name="phone" id="phone" value="<?php echo $UpdateById['Data'][0]->phone; ?>" >
            </div>
            <div>
                <label for="dob">DOB:</label>
                <input type="date" name="dob" id="dob" value="<?php echo $UpdateById['Data'][0]->dob; ?>" >
            </div>
            <div >
                <label for="" >Gender:</label>
                <input  type="radio" name="gender" id="Male" <?php if($UpdateById['Data'][0]->gender == "Male"){ echo "checked" ;} ?> value="Male"><label for="Male"style="display: inline">Male</label>
                <input  type="radio" name="gender" id="Female"<?php if($UpdateById['Data'][0]->gender == "Female"){ echo "checked" ;} ?> value="Female"><label for="Female" style="display: inline;">Female</label>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" value="<?php echo $UpdateById['Data'][0]->password; ?>" >
            </div>
           
            <div>
                <label for="hobby">Hobby:</label>
                <?php $HobbyData = explode(",",$UpdateById['Data'][0]->hobby);
                // echo "<pre>";
                // print_r($HobbyData);
                // echo "</pre>";

                 ?>
                <input type="checkbox" name="hobby[]" id="cricket" <?php if(in_array("cricket",$HobbyData)){ echo "checked" ;} ?>  value="cricket"><label for="cricket" style="display: inline">Cricket</label>
                <input type="checkbox" name="hobby[]" id="reading" <?php if(in_array("reading",$HobbyData)){ echo "checked" ;} ?> value="reading"><label for="reading" style="display: inline">Reading</label>
                <input type="checkbox" name="hobby[]" id="watching Movies" <?php if(in_array("watching Movies",$HobbyData)){ echo "checked" ;} ?> value="watching Movies"><label for="watching Movies" style="display: inline">Watching Movies</label>
                <input type="checkbox" name="hobby[]" id="music"<?php if(in_array("music",$HobbyData)){ echo "checked" ;} ?> value="music"><label for="music" style="display: inline">Music</label>
            </div>
            <div >
                <label for="" >City:</label>
                <select class="form-control">
                    <option value="checked" >Select City</option>
                    <?php foreach ($CityData['Data'] as $key => $value) { ?>
                        
                        <option <?php if($UpdateById['Data'][0]->city == $value->cid){ echo "selected" ;} ?> value="<?php  $value->cid ;?>"  ><?php echo $value->name ;?></option>
                   <?php  } ?>
                </select>
               
            </div>

            <div>
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" value="yes" /> I agree
                    with the
                    <a href="#" title="term of services">term of services</a>
                </label>
            </div>
            <button  type="submit" name="update">Update</button>
            
        </form>
    </main>
</body>

</html>