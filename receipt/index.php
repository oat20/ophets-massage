<?php
session_start();
require_once '../config.inc.php';
require_once '../connect.php';
require_once '../function.php';
require_once './function.inc.php';

$setlabel = setLabel();

$sql = mysqli_query($con, "SELECT CustomerNo,
    CusNo,
    concat(CusName,' ',CusSurname) as name,
    floor(DATEDIFF(CURDATE(), CusBirth) / 365) as age,
    CustomerNo
    FROM customer
    ORDER BY CustomerNo
    limit 100
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once './css.inc.php';?>
    <title>List of Customers</title>
</head>
<body>
    <?php echo page_navbar("", "#");?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a href="./index.php" class="list-group-item">
                        <i class="fa fa-print fa-fw"></i> พิมพ์ใบเสร็จ
                    </a>
                    <a href="./invoice.php" class="list-group-item"><i class="fa fa-ban fa-fw"></i> ยกเลิกใบเสร็จ</a>
                </div>
            </div>
            <!-- col -->
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">รายชื่อคนไข้</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th></th>
                                <th>รหัสผู้ป่วยเก่า</th>
                                <th><?php echo $setlabel['lbName'];?></th>
                                <th><?php echo $setlabel['lbAge'];?></th>
                                <th>รหัสผู้ป่วยใหม่</th>
                            </thead>
                            <tbody>
                                <?php
                                while($rs = mysqli_fetch_assoc($sql)):
                                    echo '<tr>
                                    <td><a href="./SerForm.php?id='.$rs['CustomerNo'].'" class="btn btn-danger">ออกใบเสร็จ</a></td>
                                    <td>'.$rs['CusNo'].'</td>
                                    <td>'.$rs['name'].'</td>
                                    <td>'.$rs['age'].'</td>
                                    <td>'.$rs['CustomerNo'].'</td>
                                    </tr>';
                                endwhile;
                                ?>
                            </tbody>
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
        $(function(){

            $(".list-group a:first").addClass("active");

        });
    </script>
</body>
</html>