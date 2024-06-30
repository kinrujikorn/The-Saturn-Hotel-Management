<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['hotelname'])){
	echo "Please Input hotelname" ;
}elseif(empty($_POST['hoteladdress'])){
	echo "Please Input hoteladdress" ;
}elseif(empty($_POST['hotelemail'])){
	echo "Please Input hotelemail" ;
}elseif(empty($_POST['hotelphone'])){
	echo "Please Input hotelphone" ;


}else{
	//esc//ape variables for security
    $Hotelname = mysqli_real_escape_string($con, $_POST['hotelname']);
    $Hoteladdress = mysqli_real_escape_string($con, $_POST['hoteladdress']);
    $Hotelemail = mysqli_real_escape_string($con, $_POST['hotelemail']);
    $Hotelphone = mysqli_real_escape_string($con, $_POST['hotelphone']);

    
	$sql="INSERT INTO hotel_info (hotel_name,hotel_address,hotel_email,hotel_phone)
	VALUES ('$Hotelname', '$Hoteladdress','$Hotelemail','$Hotelphone')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="hotel-form.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back" onclick="goToAdminStaffPage()"/></td>
</tr>
<script>
function goToAdminStaffPage() {
    window.location.href = 'admin-room-list.php'; 
}
</script>
</table>