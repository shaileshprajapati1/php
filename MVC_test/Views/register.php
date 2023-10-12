<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
</head>

<body>
    <div class="container mt-2">
        <h3 class="text-center ">Registrion</h3>
        <form method="post" class="row g-3">
            <div class="col-md-6 offset-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="passwrod" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwrod" name="passwrod" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="phone" class="form-label">Phone No</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="radio" name="gender" id="Male" value="Male"><label for="Male">Male</label>
                <input type="radio" name="gender" id="Female" value="Female"><label for="Female">Female</label>
            </div>
            <div class="col-md-6 offset-3">
                <label for="hobby" class="form-label">Hobby</label><br>
                <input type="checkbox" name="hobby[]" id="Cricket" value="Cricket"><label for="Cricket">Cricket</label>
                <input type="checkbox" name="hobby[]" id="Music" value="Music"><label for="Music">Music</label>
                <input type="checkbox" name="hobby[]" id="Reading" value="Reading"><label for="Reading">Reading</label>
            </div>



            <div class="col-md-6 offset-3">
               <input type="submit" value="Register" class="btn btn-success" name="register" id="register">
            </div>
        </form>
    </div>
</body>

</html>