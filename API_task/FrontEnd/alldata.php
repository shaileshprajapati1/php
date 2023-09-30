<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">


        <table class="table table-bordered">
            <h3 class="text-center mt-3">All Data</h3>
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody id="alllist">

            </tbody>
        </table>
        <script>
            async function getdata() {
                const response = await fetch("http://localhost/php/php/API_task/BackEnd/alldata");
                // console.log(response)
                const data = await response.json();
                console.log(data.Data);
                let Htmllist = ""
                data.Data.forEach(element => {
                    console.log(element);
                    Htmllist += `<tr><td>${element.fullname}</td>
                <td>${element.username}</td>
                <td>${element.email}</td>
                <td>${element.phone}</td>
                </tr>`

                });
                document.getElementById("alllist").innerHTML = Htmllist
            }
            getdata()
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>

</html>