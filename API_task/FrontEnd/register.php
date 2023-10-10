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
    <div class="container ">
        <form method="post" id="formdata">

            <h5 class="text-center mt-3" id="exampleModalLabel">Register</h5>

            <div class="modal-body">

                <div class="row">
                    <div class="col-6 offset-2">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 offset-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>

                <div class="row ">
                    <div class="col-6 offset-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 offset-2">
                        <label for="gender" class="form-label">Gender</label><br>
                        <input type="radio" name="gender" id="Male" value="Male"><label for="Male">Male</label>
                        <input type="radio" name="gender" id="Female" value="Female"><label for="Female">Female</label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 offset-2" class="form-check">
                        <label for="hobby">Hobby</label><br>
                        <input type="checkbox" name="hobby[]" class="form-check-input" id="crickect" value="crickect"><label class="form-check-label" for="crickect">crickect</label>
                        <input type="checkbox" name="hobby[]" class="form-check-input" id="reading" value="reading"><label class="form-check-label" for="reading">reading</label>
                        <input type="checkbox" name="hobby[]" class="form-check-input" id="music" value="music"><label class="form-check-label" for="music">music</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 offset-2">
                        <label for="country" class="form-label">Country</label>
                        <select name="country" onchange="statebycountyid(this)" class="form-select" id="country">
                        </select>
                    </div>
                </div>
                <div class="row  mb-2">
                    <div class="col-6 offset-2">
                        <label for="states" class="form-label">States</label>
                        <select name="states" onchange="citybystateid(this)" class="form-select" id="states">
                        </select>
                    </div>
                </div>
                <div class="row  mb-2">
                    <div class="col-6 offset-2">
                        <label for="city" class="form-label">City</label>
                        <select name="city" class="form-select" id="city">

                        </select>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 offset-4">
                        <input type="submit" name="register" id="register" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $("#formdata").on("submit", function(e) {
            e.preventDefault();
            var result = {};
            $.each($('#formdata').serializeArray(), function() {
                result[this.name] = this.value;
            });
            console.log(result);

            var hobbylist = "";
            $('input[type=checkbox]').each(function() {
                if(this.checked){
                    hobbylist += $(this).val()+",";
                }
            });
            hobbylist = hobbylist.substring(0,(hobbylist.length-1));
            // console.log(hobbylist);
            result['hobby'] = hobbylist
            delete result['hobby[]']
            

        })



        // Country Fetch Start
        fetch(`http://localhost/php/php/API_task/BackEnd/allcountrybyid`).then((res) => res.json()).then((result) => {
            // console.log(result.Data);
            let htmlres = "<option value=''>Select Country</option>"
            result.Data.map((data) => {
                // console.log(data);
                htmlres += `<option value='${data.country_id}'>${data.country_name}</option>`

            })
            document.getElementById("country").innerHTML = htmlres
        })
        // Country Fetch End

        // States Fetch Start
        function statebycountyid(e) {
            // console.log(e.value);
            fetch(`http://localhost/php/php/API_task/BackEnd/allstatesbyid?countryid=${e.value}`).then((res) => res.json()).then((result) => {
                // console.log(result.Data);
                let htmlres = "<option value=''>Select States</option>"
                result.Data.map((data) => {
                    // console.log(data);
                    htmlres += `<option value='${data.sid}'>${data.name}</option>`
                })
                document.getElementById("states").innerHTML = htmlres
            })
        }
        // States Fetch End

        // Cities Fetch Start
        function citybystateid(e) {
            // console.log(e.value);
            fetch(`http://localhost/php/php/API_task/BackEnd/allcitiesbyid?state_id=${e.value}`).then((res) => res.json()).then((result) => {
                // console.log(result.Data);
                let htmlres = "<option value=''>Select Cities</option>"
                result.Data.map((data) => {
                    // console.log(data);
                    htmlres += `<option value='${data.cid}'>${data.name}</option>`
                })
                document.getElementById("city").innerHTML = htmlres
            })
        }
        // Cities Fetch End
    </script>


</body>

</html>