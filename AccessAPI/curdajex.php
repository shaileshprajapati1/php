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
        <td><input type="button" value="btn" name="btn" id="btn"></td>
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
    function getalltodo(){
        // console.log("called");
        fetch("http://localhost/PHP/php/API/getalltododata").then((res) => res.json()).then((result) => {
            console.log(result.Data);
            let HtmlRes = ""
            result.Data.map((val) => {
                console.log(val.title);
                HtmlRes += `<tr><td>${val.title}</td><td>${val.id}</td></tr>`
            })
            document.getElementById("todolist").innerHTML=HtmlRes
        })
    }
    getalltodo()

    document.getElementById("btn").addEventListener("click",function(){
        let todoitem = document.getElementById("todoitem").value;
        fetch("http://localhost/PHP/php/API/addtodo",
         {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                title:todoitem
            })
         }).then((res) => res.json()).then((result) => {
            getalltodo()
         })

    })
</script>
</body>
</html>