<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <form id="formdata" method="post">
            <table class="mt-5 mb-5">
                <tr>
                    <td><label for="title" class="form-label">Title</label></td>
                    <td><input type="text" name="title" id="title" class="form-control"></td>
                </tr>
                <tr>

                    <td><label for="status" class="form-label"> Status</label></td>
                    <td><select name="status" id="status" class="form-control">
                            <option selected>---Select Status--</option>
                            <option value="pending">pending</option>
                            <option value="active">active</option>
                            <option value="complete">complete</option>
                        </select></td>
                </tr>
                <tr>

                    <td>&nbsp;<input type="submit" name="addtodo" id="addtodo"></td>
                </tr>

            </table>
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody id="showtodo">

            </tbody>
        </table>

        <script>
            document.getElementById("formdata").addEventListener("submit", function(e) {
                e.preventDefault();
                var result = {};
                $.each($('#formdata').serializeArray(), function() {
                    result[this.name] = this.value;
                });
                console.log(result);
                fetch("http://localhost/php/php/API_task/BackEnd/todoadd", {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(result)
                }).then((res) => res.json()).then((Response => {
                    showalltodo();
                }))
            })

            async function showalltodo() {
                let Showdata = await fetch("http://localhost/php/php/API_task/BackEnd/showalltodo")
                // console.log(Showdata);
                let ShowdataRes = await Showdata.json()
                // console.log(ShowdataRes.Data);
                var $htmlRes = ""
                ShowdataRes.Data.forEach((element) => {
                    console.log(element);
                    $htmlRes += `<tr>
                    <td> ${element.title} </td>
                    <td> ${element.status} </td>   
                    <td>
                    <button onclick ="editbytodo(${element.id})">Edit</button>&nbsp;
                    <button onclick ="deletebytodo(${element.id})">Delete</button>
                     </td>   

                    </tr>`
                });
                document.getElementById('showtodo').innerHTML = $htmlRes
            }
            showalltodo();

            async function editbytodo(id){
                // console.log("called "+id);
                let Selecttodo = await fetch(`http://localhost/php/php/API_task/BackEnd/selecttodo?id=${id}`)
            }

        </script>





        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
</body>

</html>