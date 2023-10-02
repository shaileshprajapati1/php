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
        <form method="get" id="formmailcheck">

            <input type="email" name="email" id="email" onkeyup="checkmail(this)" placeholder="Enter Email...">
            <span id="emailErrror"></span>

            <input type="submit" name="btn" id="btn" value="submit">

        </form>
        <script>
            async function checkmail(e) {
                console.log(e.value);
                let checkemail = await fetch(`http://localhost/php/php/API_task/BackEnd/checkemail?email=${e.value}`)

                let checkemailres = await checkemail.json()
                // console.log(checkemailres.Code);
                if (checkemailres.Code == 1) {
                    document.getElementById('emailErrror').innerHTML = "Email Alredy exists"
                    document.getElementById("btn").disabled = true;
                } else {
                    document.getElementById('emailErrror').innerHTML = "valid"
                    document.getElementById("btn").disabled = false;

                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>

</html>