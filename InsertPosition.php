<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['positionname'])){
	echo "Please Input positionname" ;
}elseif(empty($_POST['positiondetails'])){
	echo "Please Input positiondetails" ;
}elseif(empty($_POST['positioncount'])){
	echo "Please Input positioncount" ;



}else{
	//esc//ape variables for security
    $Positionname = mysqli_real_escape_string($con, $_POST['positionname']);
    $Positiondetails = mysqli_real_escape_string($con, $_POST['positiondetails']);
    $Positioncount = mysqli_real_escape_string($con, $_POST['positioncount']);
    
    
	$sql="INSERT INTO position_info (position_name,position_detail,position_count)
	VALUES ('$Positionname', '$Positiondetails','$Positioncount')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="position-form.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back" onclick="goToAdminStaffPage()"/></td>
    <script>
function goToAdminStaffPage() {
    window.location.href = 'admin-position.php'; 
}
</script>
</table>