<?php
session_start();

if(empty($_SESSION['UserID']) or $_SESSION['UserID'] == ''){
    header('location: ../index.php');
}

require_once './config.inc.php';
require_once './connect.php';
require_once '../function.php';
require_once './function.inc.php';

$setlabel = setLabel();

/*
$sql = mysqli_query($con, "SELECT CustomerNo,
    CusNo,
    concat(CusName,' ',CusSurname) as name,
    floor(DATEDIFF(CURDATE(), CusBirth) / 365) as age,
    CustomerNo
    FROM customer
    ORDER BY CustomerNo
");
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once './css.inc.php';?>
    <title>List of Customers</title>
</head>
<body>
    <?php echo page_navbar("", "../HomePage.php");?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-2">
                <?php require_once './menu.inc.php';?>
            </div>
            <!-- col -->
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">รายชื่อคนไข้</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="tbCustomer">
                            <thead>
                                <th></th>
                                <th>รหัสผู้ป่วยเก่า</th>
                                <th><?php echo $setlabel['lbName'];?></th>
                                <th><?php echo $setlabel['lbAge'];?></th>
                                <th>รหัสผู้ป่วยใหม่</th>
                            </thead>
                            <!--
                            <tbody>
                                <?php
                                /*
                                while($rs = mysqli_fetch_assoc($sql)):
                                    echo '<tr>
                                    <td><a href="./SerForm.php?txtCustomerNo='.$rs['CustomerNo'].'&txtCusName='.$rs['name'].'&txtAge='.$rs['age'].'" class="btn btn-danger">ออกใบเสร็จ</a></td>
                                    <td>'.$rs['CusNo'].'</td>
                                    <td>'.$rs['name'].'</td>
                                    <td>'.$rs['age'].'</td>
                                    <td>'.$rs['CustomerNo'].'</td>
                                    </tr>';
                                endwhile;
                                */
                                ?>
                            </tbody>
                            -->
                        </table>
                        </div>
                    </div>
                </div>
                <!-- panel -->
            </div>
            <!-- col -->
        </div>
        <!-- row -->

    </div>
    <!-- con -->

    <?php require_once './js.inc.php';?>
    <script>
        $(document).ready(function(){

            $(".list-group a:first").addClass("active");

            $('#tbCustomer').DataTable({
                ajax: {
                   url: '../json/customers.php',
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
                    $('td', row).eq(0).html('<a href="./SerForm.php?txtCustomerNo='+data.customerno+'&txtCusName='+data.name+'&txtAge='+data.age+'" class="btn btn-danger">ออกใบเสร็จ</a>');
                }
            });

        });
    </script>
</body>
</html>