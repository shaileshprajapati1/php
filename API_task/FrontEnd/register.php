<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <label for="college" class="form-label">College</label>
                        <input type="text" name="college" id="college" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <label for="mob" class="form-label">Phone</label>
                        <input type="tel" name="mob" id="mob" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <label for="gender" class="form-label">Gender</label>
                    <div class="col">
                        <input type="radio" name="gender" id="Male" value="Male"><label for="Male">Male</label>
                        <input type="radio" name="gender" id="Female" value="Female"><label for="Female">Female</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="country" class="form-label">Country</label>
                    <select name="country" class="form-select" id="country">
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="row  mb-2">
                    <label for="states" class="form-label">States</label>
                    <select name="states" class="form-select" id="states">
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="row  mb-2">
                    <label for="city" class="form-label">City</label>
                    <select name="city" class="form-select" id="city">
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="row ">
                    <div class="col">
                        <button type="submit" name="register" id="register" class="btn btn-primary">register</button>
                    </div>
                </div>
            </div>
        </form>
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