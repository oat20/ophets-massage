<?php
session_start();
require_once './config.inc.php';
require_once './connect.php';
require_once './function.inc.php';

$sql = mysqli_query($con, "SELECT service.InvoiceNo,
    service.BookNo,
    date_format(service.Date, '%d.%m.%Y') as DateInvoice,
    service.CusName,
    concat(customer.Point,' ',customer.CusName,' ',customer.CusSurname) as name,
    service.Cost,
    service.CustomerNo
    FROM service
    LEFT JOIN customer on (service.CustomerNo = customer.CustomerNo)
    where date_format(service.Date, '%Y-%m') = date_format(CURDATE(), '%Y-%m')
    ORDER BY service.InvoiceNo DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once './css.inc.php';?>
    <title>List of Invoices</title>
</head>
<body>
    <?php echo page_navbar("", "#");?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-2">
                <?php require_once './menu.inc.php';?>
            </div>
            <!-- col -->
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ใบเสร็จ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th></th>
                                <th>วันที่</th>
                                <th>เลขที่ใบเสร็จ</th>
                                <th>ลูกค้า</th>
                                <th>ราคา</th>
                            </thead>
                            <tbody>
                                <?php
                                while($rs = mysqli_fetch_assoc($sql)):
                                    $btnDisabled = ($rs['CustomerNo'] == 'C000000') ? "disabled" : "";
                                    echo '<tr>
                                    <td><a href="../frmInvoice.php?InvoiceNo='.$rs['InvoiceNo'].'&BookNo='.$rs['BookNo'].'" class="btn btn-success '.$btnDisabled.'" target="_blank">พิมพ์</a></td>
                                    <td>'.$rs['DateInvoice'].'</td>
                                    <td>'.$rs['InvoiceNo'].'</td>
                                    <td>'.$rs['CusName'].'</td>
                                    <td>'.$rs['Cost'].'</td>
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
            $(".list-group a:eq(1)").addClass("active");
        });
    </script>
</body>
</html>