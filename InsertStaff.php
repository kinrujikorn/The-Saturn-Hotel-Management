<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['hotel_ID'])){
	echo "Please Input hotel_ID" ;
}elseif(empty($_POST['stafffullname'])){
	echo "Please Input stafffullname" ;
}elseif(empty($_POST['stafflastname'])){
	echo "Please Input stafflastname" ;
}elseif(empty($_POST['staffaddress'])){
	echo "Please Input staffaddress" ;
}elseif(empty($_POST['staffemail'])){
	echo "Please Input staffemail" ;
}elseif(empty($_POST['staffphone'])){
	echo "Please Input staffphone" ;
}elseif(empty($_POST['staffgender'])){
	echo "Please Input staffgender" ;
}elseif(empty($_POST['staffaddress'])){
	echo "Please Input staffaddress" ;
}elseif(empty($_POST['staffpassword'])){
	echo "Please Input staffpassword" ;



}else{
	//esc//ape variables for security
    $Hotel_ID = mysqli_real_escape_string($con, $_POST['hotel_ID']);
    $Stafffullname = mysqli_real_escape_string($con, $_POST['stafffullname']);
    $Stafflastname = mysqli_real_escape_string($con, $_POST['stafflastname']);
    $Staffaddress = mysqli_real_escape_string($con, $_POST['staffaddress']);
    $Staffemail = mysqli_real_escape_string($con, $_POST['staffemail']);
    $Staffphone = mysqli_real_escape_string($con, $_POST['staffphone']);
    $Staffgender = mysqli_real_escape_string($con, $_POST['staffgender']);
    $Staffsalary = mysqli_real_escape_string($con, $_POST['staffsalary']);
    $PositionID = mysqli_real_escape_string($con, $_POST['positionID']);
	$Staffpassword = mysqli_real_escape_string($con, $_POST['staffpassword']);
	$sql="INSERT INTO staff_info (hotel_ID,staff_fName,staff_lName,staff_address,staff_email,staff_phone,staff_gender,salary,position_ID)
	VALUES ('$Hotel_ID', '$Stafffullname',' $Stafflastname',' $Staffaddress',' $Staffemail','$Staffphone','$Staffgender','$Staffsalary','$PositionID')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;

	$query = "SELECT MAX(staff_ID) AS max_staff_id FROM staff_info";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$max_staff_id = $row['max_staff_id'];

	$sql2 = "INSERT INTO staff_user_password (username, password, staff_ID)
	VALUES ('$Staffemail', MD5('$Staffpassword'), '$max_staff_id')";
	
	if (!mysqli_query($con,$sql2)) {
		die('Error: ' . mysqli_error($con));
	}
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="staff-form.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back" onclick="goToAdminStaffPage()"/></td>
</tr>
<script>
function goToAdminStaffPage() {
    window.location.href = 'admin-staff.php'; 
}
</script>
</table>