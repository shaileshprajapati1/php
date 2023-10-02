<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <table>
            <form action="" method="get">

                <tr>
                    <div class="col-6">
                        <label for="username" class="label-control">Username</label>
                        <input type="text" name="username" id="username" onkeyup="checkinput(this,'username')" class="form-control">
                        <span id="usernameerror"></span>
                    </div>
                </tr>
                <tr>
                    <div class="col-6">
                        <label for="email" class="label-control">Email</label>
                        <input type="email" name="email" id="email" onkeyup="checkinput(this,'email')" class="form-control">
                        <span id="emailerror"></span>
                    </div>
                </tr>
                <tr>
                    <div class="col-6">
                        <label for="phone" class="label-control">phone</label>
                        <input type="text" name="phone" id="phone" onkeyup="checkinput(this,'phone')" class="form-control">
                        <span id="phoneerror"></span>
                    </div>
                </tr>
                <tr>
                    <div class="col-6 mt-2">
                        <Button id="btn">Click</Button>
                    </div>
                </tr>
            </form>
        </table>

        <script>
            async function checkinput(e, field) {
                // console.log(e, field);
                // console.log(e.value);
                if (e.value != "") {
                    let userdatabyfield = await fetch(`http://localhost/php/php/API_task/BackEnd/checkvalidation?${field}=${e.value}`)
                    // console.log(userdatabyfield);
                    let userdatabyfieldres = await userdatabyfield.json()
                    // console.log(userdatabyfieldres.Data);
                    if (userdatabyfieldres.Code == 1) {
                        if (field == "username") {
                            document.getElementById('usernameerror').innerHTML = "Username Already Exits"
                        } else if (field == "email") {
                            document.getElementById('emailerror').innerHTML = "Email Already Exits"
                        } else {
                            document.getElementById('phoneerror').innerHTML = "phone Already Exits"
                        }
                        document.getElementById("btn").disabled = true;
                    } else {
                        if (field == "username") {
                            document.getElementById('usernameerror').innerHTML = "valid"
                        } else if (field == "email") {
                            document.getElementById('emailerror').innerHTML = "valid"
                        } else {
                            document.getElementById('phoneerror').innerHTML = "valid"
                        }
                        document.getElementById("btn").disabled = false;
                    }

                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>

</html>