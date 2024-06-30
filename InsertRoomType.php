<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['roomtypename'])){
	echo "Please Input roomtypename" ;
}elseif(empty($_POST['bedquantity'])){
	echo "Please Input bedquantity" ;
}elseif(empty($_POST['bathroomquantity'])){
	echo "Please Input bathroomquantity" ;
}elseif(empty($_POST['roomprice'])){
	echo "Please Input roomprice" ;



}else{
	//esc//ape variables for security
    $Roomtypename = mysqli_real_escape_string($con, $_POST['roomtypename']);
    $Bedquantity = mysqli_real_escape_string($con, $_POST['bedquantity']);
    $Bathroomquantity = mysqli_real_escape_string($con, $_POST['bathroomquantity']);
    $Roomprice = mysqli_real_escape_string($con, $_POST['roomprice']);
    
    
	$sql="INSERT INTO room_types_table (room_type_name,bed_quan,bathroom_quan,price)
	VALUES ('$Roomtypename', '$Bedquantity','$Bathroomquantity',' $Roomprice')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="room-type-form.php">
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