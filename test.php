<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./bootstrap@3/css/bootstrap.min.css" rel="stylesheet">
    <link href="./jquery-ui-1.9.1.custom/css/redmond/jquery-ui-1.9.1.custom.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <style>
        body{
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">

    <table class="table table-bordered table-striped" id="response">
        <thead>
            <tr>
                <th>#</th>
                <th>ข้อความ</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    </div>

    <script src="./jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
    <script src="./bootstrap@3/js/bootstrap.min.js"></script>
    <script src="./jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>
    <script>
        fetch('https://jsonplaceholder.typicode.com/todos')
            .then(response => response.json())
            .then(function(json){
                console.log(json);
                var content = '';
                json.map(function(item, index){
                    console.log(item.title);
                    content += "<tr>";
                    content += "<td>"+index+"</td>";
                    content += "<td>"+item.title+"</td>";
                    content += "</tr>";
                    document.getElementById("response").querySelector("tbody").innerHTML = content;
                });
            });
    </script>
</body>
</html>