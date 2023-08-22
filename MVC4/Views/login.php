<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <!-- <div class="container mt-1 mb-5"> -->
    <div class="row mt-5">
        <div class="col-lg-4 offset-lg-4">
            <div class="card border-primary mb-3">
                <div class="card-header text-center">Login</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Enter User Name" class="form-control" name="username" id="" required>
                            </div>
                        </div>
                       
                        <div class="row mt-3">
                            <div class="col">
                                <input type="password" placeholder="Enter Password" class="form-control" name="password" id=""required>
                            </div>
                        </div>
                       
                        <div class="row mt-3 mb-3">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-primary" value="Login" name="login" id="">
                               
                            </div>
                        </div>
                        
                        <div class="text-center" >
                            <a class="btn btn-danger " href="register">Click Here To Registration</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</body>

</html>