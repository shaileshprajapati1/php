<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <!-- <div class="container mt-1 mb-5"> -->
    <div class="row mt-5">
        <div class="col-lg-4 offset-lg-4"><a href="home">Home</a>
            <div class="card border-primary mb-3">
                <div class="card-header text-center">Registration</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Enter User Name" class="form-control" name="username" id="" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="text" placeholder="Enter Full Name" class="form-control" name="fullname" id=""required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="password" placeholder="Enter Password" class="form-control" name="password" id=""required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="email" placeholder="Enter Email Id" class="form-control" name="email" id=""required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Gender</label><br>
                                <input type="radio"   name="gender" id="Male" value="Male"><label for="Male">Male</label>
                                <input type="radio"   name="gender" id="Female" value="Female"><label for="Female">Female</label>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-primary" value="Registration" name="register" id="">
                                <input type="reset" class="btn btn-danger" name="" id="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</body>

</html>