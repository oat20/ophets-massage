<?php
require_once './receipt/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once './receipt/css.inc.php';?>
</head>
<body>
    <div class="container-fluid">

    <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="response">
        <thead>
            <tr>
                <th>Col0</th>
                <th>Col1</th>
                <th>Col2</th>
                <th>Col3</th>
                <th>Col4</th>
            </tr>
        </thead>
    </table>
    </div>

    </div>

    <?php require_once './receipt/js.inc.php';?>
    <script>
        $(document).ready(function(){
            $('#response').DataTable({
                ajax: {
                   url: './json/customers.php',
                   dataSrc: 'data'
                },
                columns: [
                    {
                        data: null,
                        //defaultContent: '<a href="" class="btn btn-danger">ออกใบเสร็จ</a>'
                    },
                    {data: 'cusno'},
                    {data: 'name'},
                    {data: 'age'},
                    {data: 'customerno'}
                ],
                order: [
                    [4, 'asc']
                ],
                columnDefs: [
                    {
                        targets: 0,
                        data: null,
                        defaultContent: '<a href="" class="btn btn-danger">ออกใบเสร็จ</a>'
                    }
                ],
                createdRow: function(row, data, index){
                    //console.log(row);
                    //console.log(data.customerno);
                    //console.log(index);
                    $('td', row).eq(0).html('<a href="./receipt/SerForm.php?txtCustomerNo='+data.customerno+'&txtCusName='+data.name+'&txtAge='+data.age+'" target="_blank" class="btn btn-danger">ออกใบเสร็จ</a>');
                }
            });
        });
    </script>
</body>
</html>