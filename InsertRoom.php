<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['hotel_ID'])){
	echo "Please Input hotel_ID" ;
}elseif(empty($_POST['roomnumber'])){
	echo "Please Input roomnumber" ;
}elseif(empty($_POST['roomfloor'])){
	echo "Please Input roomfloor" ;
}elseif(empty($_POST['room_type_ID'])){
	echo "Please Input room_type_ID" ;
}elseif(empty($_POST['roomdescription'])){
	echo "Please Input roomdescription" ;


}else{
	//esc//ape variables for security
    $Hotel_ID = mysqli_real_escape_string($con, $_POST['hotel_ID']);
    $Roomnumber = mysqli_real_escape_string($con, $_POST['roomnumber']);
    $Roomfloor = mysqli_real_escape_string($con, $_POST['roomfloor']);
	$Room_type_ID = mysqli_real_escape_string($con, $_POST['room_type_ID']);
	$Roomdescription = mysqli_real_escape_string($con, $_POST['roomdescription']);


    
    
	$sql="INSERT INTO room_info (hotel_ID,room_number,room_floor,room_type_ID,description)
	VALUES ('$Hotel_ID','$Roomnumber','$Roomfloor','$Room_type_ID','$Roomdescription')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="room-form.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>