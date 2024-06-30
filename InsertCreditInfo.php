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

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$card_num = $_POST['card_num'];
$card_exp = $_POST['card_exp'];

$invoice_q = "SELECT invoice_ID FROM invoicing_table ORDER BY invoice_ID DESC LIMIT 1";
$invoice_r = mysqli_query($connect, $invoice_q);

if ($invoice_r && mysqli_num_rows($invoice_r) > 0) {
    $row = mysqli_fetch_assoc($invoice_r);
    $invoice_ID = $row['invoice_ID'];
}

$credit_pay_insert = "INSERT INTO credit_payments (invoice_ID, card_fName, card_lName, card_number, card_expire_date)
    VALUES ('$invoice_ID','$fname', '$lname','$card_num',LAST_DAY('$card_exp'))";
$credit_pay_insert_r = mysqli_query($connect, $credit_pay_insert);


echo "Success";
header("Location: payment-complete-card.php");
exit();
mysqli_close($connect);

?>

<form name="inpfrm" method="post" action="list-room.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>