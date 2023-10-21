<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login page</title>
</head>

<body>
    <div class="container mt-2">
        <h3 class="text-center ">Login</h3>
        <form method="post" id="loginform" class="row g-3">

            <div class="col-md-6 offset-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="col-md-6 offset-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>


            <div class="col-md-6 offset-3">
                <input type="submit" value="Login" class="btn btn-success" name="login" id="login">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        document.getElementById("loginform").addEventListener("submit",function(e){
            e.preventDefault();
            // console.log(e.target.email.value);
            let Emailbyid =e.target.email.value
            let Passwordbyid =e.target.password.value
            fetch(`http://localhost/php/php/MVC_test/bankend/loginbyapi`,{
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
                body: JSON.stringify({
                    email:Emailbyid,
                    password:Passwordbyid
                }),

            }).then((res)=>res.json()).then((responce)=>{
                console.log(responce);
                alert('Login Success');
                window.location.href='viewallusers.php';
                
            })
                    
        })
    </script>
</body>

</html>