<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register page</title>
</head>

<body>
    <div class="container mt-2">
        <h3 class="text-center ">Registrion</h3>
        <form method="post" id="registerform" class="row g-3">
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
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $("#registerform").on("submit", function(e) {
            e.preventDefault();
            // console.log(e.target);
            let result = {};
            $.each($("#registerform").serializeArray(), function() {
                // console.log(this);
                result[this.name] = this.value

            })

            var hobby = [];
            $(':checkbox:checked').each(function(i) {
                hobby[i] = $(this).val();
            });
            // console.log(hobby);
            hobby = hobby.toString();

            result['hobby'] = hobby;
            delete result['hobby[]']
            // console.log(result);

            fetch(`http://localhost/php/php/MVC_test/bankend/registerbyapi`, {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                mode: "cors", // no-cors, *cors, same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                credentials: "same-origin", // include, *same-origin, omit
                headers: {
                    "Content-Type": "application/json",
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: "follow", // manual, *follow, error
                referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(result),

            }).then((res) => res.json()).then((responce) => {
                // console.log(responce);
                alert('Registration Success');
                window.location.href='login.php';
            })

        })


    </script>


</body>

</html>