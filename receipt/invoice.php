<?php
session_start();

if(empty($_SESSION['UserID']) or $_SESSION['UserID'] == ''){
    header('location: ../index.php');
}

require_once './config.inc.php';
require_once './connect.php';
require_once './function.inc.php';

$sql = mysqli_query($con, "SELECT service.InvoiceNo,
    date_format(service.Date, '%d/%m/%Y') as DateInvoice,
    service.CusName,
    concat(customer.Point,' ',customer.CusName,' ',customer.CusSurname) as name,
    service.Cost,
    service.DocName,
    service.CustomerNo
    FROM service
    LEFT JOIN customer on (service.CustomerNo = customer.CustomerNo)
    where service.Date = CURRENT_DATE()
    ORDER BY service.Date DESC,
    service.InvoiceNo DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once './css.inc.php';?>
    <title>List of Invoices</title>
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
                        <h3 class="panel-title">ใบเสร็จ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="tbInvoiceCancel">
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
                                    $btnDisabled = ($rs['CustomerNo'] == "C000000") ? "disabled" : "";
                                    echo '<tr>
                                    <td><a href="#" data-toggle="modal" data-target="#modalCancelInvoice" class="btn btn-danger '.$btnDisabled.'"
                                    data-invoice="'.$rs['InvoiceNo'].'"
                                    data-date="'.$rs['DateInvoice'].'"
                                    data-cusname="'.$rs['CusName'].'"
                                    data-cost="'.$rs['Cost'].'"
                                    data-docname="'.$rs['DocName'].'">ยกเลิก</a></td>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalCancelInvoice">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">...</h4>
      </div>
      <form method="post" action="./invoicecancel-action.php">
      <div class="modal-body">
        <div class="form-group">
            <label>ลงวันที่</label>
            <p class="form-control-static" id="txtDate"></p>
        </div>
        <div class="form-group">
            <label>ลูกค้า</label>
            <p class="form-control-static" id="txtCusName"></p>
        </div>
        <div class="form-group">
            <label>ราคา</label>
            <p class="form-control-static" id="txtCost"></p>
        </div>
        <div class="form-group">
            <label>ผู้บำบัด</label>
            <p class="form-control-static" id="txtDocName"></p>
        </div>
        <input type="hidden" name="InvoiceNo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-danger" id="btnSubmit">ยืนยันยกเลิกใบเสร็จเลขที่</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <?php require_once './js.inc.php';?>
    <script>
        $(document).ready(function(){
            $(".list-group a:eq(2)").addClass("active");

            $('#tbInvoiceCancel').DataTable({
                columnDefs: [
                    { orderable: false, targets: 0 }
                ]
            });

            $('#modalCancelInvoice').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('invoice') // Extract info from data-* attributes
                var txtdate = button.data('date');
                var cusname = button.data('cusname');
                var cost = button.data('cost');
                var docname = button.data('docname');
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('ยกเลิกใบเส็จเลขที่ ' + recipient);
                modal.find('.modal-body #txtDate').html(txtdate);
                modal.find('.modal-body #txtCusName').html(cusname);
                modal.find('.modal-body #txtCost').html(cost);
                modal.find('.modal-body #txtDocName').html(docname);
                modal.find('.modal-body input[name="InvoiceNo"]').val(recipient);
                modal.find('.modal-footer #btnSubmit').text('ยืนยันยกเลิกใบเส็จเลขที่ ' + recipient);
            });
        });
    </script>
</body>
</html>