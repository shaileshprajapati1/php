<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <div class="container mt-2">
        <h3 class="text-center ">Login</h3>
        <form method="post" class="row g-3">

            <div class="col-md-6 offset-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="col-md-6 offset-3">
                <label for="passwrod" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwrod" name="passwrod" >
            </div>


            <div class="col-md-6 offset-3">
                <input type="submit" value="Login" class="btn btn-success" name="login" id="login">
            </div>
        </form>
    </div>
</body>

</html>