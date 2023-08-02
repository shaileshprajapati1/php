<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table>
        <tr>
            <td>Todo</td>
            <td><input type="text" name="todoitem" id="todoitem"></td>
        </tr>
        <tr>
            <td id="btn-save"><input type="button" value="btn" name="btn" id="btn"></td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="todolist">

        </tbody>
    </table>

    <script>
        function getalltododata() {
            // console.log("call");
            fetch("http://localhost/PHP/php/API/getalltododata").then((res) => res.json()).then((result) => {
                console.log(result.Data);
                let HtmlRes = ""
                result.Data.map((val) => {
                    console.log(val.title);
                    HtmlRes += `<tr><td>${val.title}</td><td><button onclick ="selecttodobyid(${val.id})">Edit</button><button onclick ='deletebyid(${val.id})'>Delete</button></td></tr>`
                })
                document.getElementById("todolist").innerHTML = HtmlRes
            })
        }
        getalltododata()


        document.getElementById("btn").addEventListener("click", function() {
            let todoitem = document.getElementById("todoitem").value
            fetch("http://localhost/PHP/php/API/addtodo", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        title: todoitem
                    })
                }).then(res => res.json())
                .then((result) => {
                    getalltododata()
                })
        })

        function selecttodobyid(id) {
            // console.log("call");
            fetch("http://localhost/PHP/php/API/selecttodobyid?todoid=" + id).then((res) => res.json()).then((result) => {
                console.log(result.Data[0].title);
                document.getElementById("todoitem").value = result.Data[0].title
                document.getElementById("btn-save").innerHTML = '<input type="button" value="update" onclick=update(' + result.Data[0].id + ') name="btn" id="btn">'

            })

        }

        function update(id) {
            // console.log(id);
            let todoitem = document.getElementById("todoitem").value
            fetch("http://localhost/PHP/php/API/updatebyid?todoid=" + id, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                       title: todoitem
                    })
                }).then(res => res.json())
                .then((result) => {
                    getalltododata()});


        }
        function deletebyid(id){
            // console.log("deleteid",id);
            let todoitem = document.getElementById("todoitem").value
            fetch("http://localhost/PHP/php/API/deletebyid?todoid=" + id).then((res)=>res.json()).then((result)=>{
                getalltododata()
            });

        }
    </script>
</body>

</html>