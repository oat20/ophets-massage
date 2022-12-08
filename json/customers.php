<?php
require_once '../receipt/config.inc.php';
require_once '../receipt/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $respone = array(
        'status' => true
    );
    $sql = mysqli_query($con, "SELECT CustomerNo,
    CusNo,
    concat(CusName,' ',CusSurname) as name,
    floor(DATEDIFF(CURDATE(), CusBirth) / 365) as age
    FROM customer
    ORDER BY CustomerNo
");
while($rs = mysqli_fetch_assoc($sql)){
    $respone['data'][] = array(
        'customerno' => $rs['CustomerNo'],
        'cusno' => $rs['CusNo'],
        'name' => $rs['name'],
        'age' => $rs['age'],
        'receiptUrl' => $cf_livesite.'receipt/SerForm.php?txtCustomerNo='.$rs['CustomerNo'].'&txtCusName='.$rs['name'].'&txtAge='.$rs['age']
    );
}
echo json_encode($respone, JSON_UNESCAPED_UNICODE);

}else{
    echo json_encode(array(
        'status' => false
    ));
}

mysqli_close($con);
?>