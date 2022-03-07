<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./jquery-ui-1.9.1.custom/css/redmond/jquery-ui-1.9.1.custom.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
    <h1>Hello World</h1>

    <ul id="response">

    </ul>

    <script src="./jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
    <script src="./jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>
    <script>
        fetch('https://jsonplaceholder.typicode.com/todos')
            .then(response => response.json())
            .then(function(json){
                console.log(json);
                var content = '';
                json.map(function(item, index){
                    console.log(item.title);
                    content += "<li>"+item.title+"</li>";
                    document.getElementById("response").innerHTML = content;
                });
            });
    </script>
</body>
</html>