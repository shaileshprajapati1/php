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
        <div class="row mt-5">
            <div class="col-md-12 ">
                <div class="card" >
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body " id="cardbody">
                        
                        <p class="card-title" id="pubDate"></p>
                        <p class="card-title" id="card_title"></p>
                       
                        <p class="card-text" id="content"></p>
                        <p class="card-text" id="full_description"></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
        </div>


        <script>
            async function getdata() {
                const response = await fetch("https://newsdata.io/api/1/news?apikey=pub_31187356146e1e775f6054d4f311b8d9b125c&q=cryptocurrency");
                // console.log(response)
                const data = await response.json();
                console.log(data.results);
                let cardbody = ""
                data.results.forEach(element => {
                    console.log(element);
                    cardbody += `<div> 
                    <p><b>${element.pubDate}</b></p>
                    <p><h2>${element.title}</h2></p>
                   
                    <p>${element.content}</p>
                    <p>${element.description}</p>
                     </div>`


                });
                document.getElementById("pubDate").innerHTML = cardbody
                document.getElementById("card_title").innerHTML = cardbody
            
                document.getElementById("content").innerHTML = cardbody
                document.getElementById("full_description").innerHTML = cardbody
            }
            getdata()
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>

</html>