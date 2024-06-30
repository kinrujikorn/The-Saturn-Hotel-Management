<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "hotel_db";

$connect = mysqli_connect($hostname, $username, $password, $databasename);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$reserveID = $_POST['reserve_ID'];
$sub_total = $_POST['sub_total'];
$net_total = $_POST['net_total'];
$payment_method = $_POST['paymentmethod'];

$invoice_insert = "INSERT INTO invoicing_table (reserve_ID, sub_total, net_total, payment_method_ID)
    VALUES ('$reserveID','$sub_total','$net_total','$payment_method')";
$invoice_insert_r = mysqli_query($connect, $invoice_insert);

if ($payment_method == 'PAY001'){
    echo "Success Cash";
    header("Location: payment-complete-cash.php");
    exit();
    mysqli_close($connect);
} elseif ($payment_method == 'PAY002') {
    echo "Success Credit";
    header("Location: credit-payment.php");
    exit();
    mysqli_close($connect);
}
?>

<form name="inpfrm" method="post" action="list-room.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>