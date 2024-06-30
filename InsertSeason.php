<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['seasonname'])){
	echo "Please Input seasonname" ;
}elseif(empty($_POST['startdate'])){
	echo "Please Input startdate" ;
}elseif(empty($_POST['enddate'])){
	echo "Please Input enddate" ;
}elseif(empty($_POST['seasondiscount'])){
	echo "Please Input seasondiscount" ;



}else{
	//esc//ape variables for security
    $Seasonname = mysqli_real_escape_string($con, $_POST['seasonname']);
    $Startdate = mysqli_real_escape_string($con, $_POST['startdate']);
    $Enddate = mysqli_real_escape_string($con, $_POST['enddate']);
    $Seasondiscount = mysqli_real_escape_string($con, $_POST['seasondiscount']);
    
	$sql="INSERT INTO season_info (season_name,start_date,end_date,season_discount)
	VALUES ('$Seasonname', '$Startdate','$Enddate',' $Seasondiscount')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="season-form.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back" onclick="goToAdminStaffPage()"/></td>
</tr>
<script>
function goToAdminStaffPage() {
    window.location.href = 'admin-seasons.php'; 
}
</script>
</table>