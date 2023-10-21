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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateform" method="post">
                            <div class="row ">
                                <div class="col">
                                    <label for="username" class="lable-control">Username</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="phone" class="form-label">Phone No</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="gender" class="form-label">Gender</label><br>
                                    <input type="radio" name="gender" id="Male" value="Male"> <label for="Male">Male</label>
                                    <input type="radio" name="gender" id="Female" value="Female"> <label for="Female">Female</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="hobby" class="form-label">Hobby</label><br>
                                    <input type="checkbox" name="hobby[]" id="Cricket" value="Cricket"> <label for="Cricket"> Cricket</label>
                                    <input type="checkbox" name="hobby[]" id="Music" value="Music"> <label for="Music"> Music</label>
                                    <input type="checkbox" name="hobby[]" id="Reading" value="Reading"> <label for="Reading"> Reading</label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

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
        async function editbyid(id) {
            // console.log(id);
            const fetchdata = await fetch(`http://localhost/php/php/MVC_test/bankend/edituserbyapi?id=${id}`);
            const fetchdatajson = await fetchdata.json()
            // console.log(fetchdatajson.Data[0]);
            document.getElementById("username").value = fetchdatajson.Data[0].username
            document.getElementById("email").value = fetchdatajson.Data[0].email
            document.getElementById("phone").value = fetchdatajson.Data[0].phone

            // Check the corresponding radio button
            const selectedOption = fetchdatajson.Data[0].gender;

            const radioButtons = document.querySelectorAll('input[name="gender"]');
            radioButtons.forEach(button => {
                if (button.value === selectedOption) {
                    button.checked = true;
                }
            });

            
            const hobby = document.querySelectorAll('input[type="checkbox"]');
            
            console.log(hobby.value);
           
            const checkboxOption = fetchdatajson.Data[0].hobby;
            const hobbyarray = checkboxOption.split(',');
            console.log(hobbyarray);
           
           


        }








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
                   <button type="button" onclick="editbyid(${element.id})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   Edit </button>
       
             
                   <button onclick="deletebyid(${element.id})" class="btn btn-danger">Delete</button>
                   </td>
                   </tr>`

                });
                document.getElementById("showalldata").innerHTML = Htmlres
            })
        }
        selectalldata()
    </script>
</body>

</html>