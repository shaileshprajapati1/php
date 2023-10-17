<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>
    <div class="container ">

        <h5 class="text-center mt-3" id="exampleModalLabel">Login</h5>

        <Form method="post" id="loginform">
            <div class="modal-body">

                <div class="row ">
                    <div class="col-6 offset-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 offset-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>

                <div class="row mt-5 ">
                    <div class="col-6 offset-5">
                        <input type="submit" name="login" id="login" value="Login" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </Form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
         document.getElementById("loginform").addEventListener("submit", (e) => {
            e.preventDefault();
            // console.log(document.getElementById("loginform"));
            const Email = e.target.email.value;
            const Password = e.target.password.value;

        //   let emailsession= sessionStorage.Email = e.target.email.value;
        //   let passwordsession= sessionStorage.Password = e.target.password.value;
        //     console.log(emailsession);
        //     console.log(passwordsession);
           

            fetch(`http://localhost/php/php/API_task/BackEnd/loginbyfetch?email=${Email}&password=${Password}`, {
                    method: "POST",
                    headers: {
                        Accept: "application/json, text/plain, */*",
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        email: Email,
                        password: Password,
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    // console.log(data);
                    // code here //
                    if (data.Code != 1) {
                        alert("Error Correct Password or Username"); /*displays error message*/
                    } else {
                        alert("Login Success"); /*opens the target page while Id & password matches*/
                        window.location.href='homepage.php';
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        });

       

    </script>
</body>