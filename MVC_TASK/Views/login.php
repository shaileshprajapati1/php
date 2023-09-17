<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Form</title>
</head>

<body>
    <div class="container mb-5 mt-5">
        <h1 class="text-center ">Login Form</h1>
        <form method="post">
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 offset-5">

                    <input type="submit" value="Login" name="login" id="login" class="btn btn-success">

                </div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-7 offset-4 ">

                <a class="btn btn-secondary" href="register">Click Here To Register</a>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>