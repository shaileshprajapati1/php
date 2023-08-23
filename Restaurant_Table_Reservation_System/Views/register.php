<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3 mb-4"><i>Sign Up</i></h2>
        <form method="post">
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone"required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-5">
                   <input type="submit" class="btn btn-success" value="Sign Up" name="login" id="login">
                   <input type="reset" class="btn btn-danger" >
             </div>
            </div>
            
        </form>
    </div>
</body>

</html>