<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Viewall Page</title>
</head>

<body>

    <div class="container mt-2">
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="logout" class="btn btn-primary me-md-2">Logout</a>

        </div> -->
        <h3 class="text-center ">All Users List</h3>
        <table class="table table-success table-striped">
            <thead>
                <th>Sr.No</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>Action</th>
            </thead>
            <tbody id="showalldata">


            </tbody>
        </table>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function selectalldata() {
            // console.log("call");
            fetch(`http://localhost/php/php/MVC_test/bankend/viewallusersapi`).then((res) => res.json()).then((responce) => {
                // console.log(responce);

                var Htmlres = ""
                responce.Data.forEach(element => {
                    // console.log(element);
                    Htmlres += `<tr>
                   <td>${element.id}</td>
                   <td>${element.username}</td>
                   <td>${element.email}</td>
                   <td>${element.phone}</td>
                   <td>${element.gender}</td>
                   <td>${element.hobby}</td>
                   <td>
                   
                   <button  onclick="editbyid(${element.id})" class="btn btn-success">Edit</button>
                   <button onclick="deletebyid(${element.id})" class="btn btn-danger">Delete</button>
                   </td>
                   </tr>`
                   
                });
                document.getElementById("showalldata").innerHTML = Htmlres
            })
        }
        selectalldata()

        async function editbyid(id) {
            // console.log($id);
            const fetchdata = await fetch(`http://localhost/php/php/MVC_test/bankend/edituserbyapi?id=${id}`);
            const fetchdatajson = await fetchdata.json()
            console.log(fetchdatajson.Data[0]);

        }
    </script>
</body>

</html>