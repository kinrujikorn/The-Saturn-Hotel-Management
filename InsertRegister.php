<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(empty($_POST['email'])){
	echo "Please Input email" ;
}elseif(empty($_POST['psw'])){
	echo "Please Input password" ;
}elseif(empty($_POST['fname'])){
	echo "Please Input fname" ;
}elseif(empty($_POST['lname'])){
	echo "Please Input lname" ;
}elseif(empty($_POST['phonenumber'])){
	echo "Please Input phone number" ;
}elseif(empty($_POST['gender'])){
	echo "Please Input gender" ;


}else{
	//esc//ape variables for security
    $Email = mysqli_real_escape_string($con, $_POST['email']);
	$Psw = mysqli_real_escape_string($con, $_POST['psw']);
    $Fname = mysqli_real_escape_string($con, $_POST['fname']);
    $Lname = mysqli_real_escape_string($con, $_POST['lname']);
	$Phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $Gender = mysqli_real_escape_string($con, $_POST['gender']);
	
    
	$sql="INSERT INTO customer_info (customer_fname,customer_email,customer_lname,customer_gender,customer_phone)
	VALUES ('$Fname', '$Email','$Lname','$Gender','$Phonenumber')";
	
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
		}
		echo "Success" ;

	
	$query = "SELECT MAX(customer_ID) AS max_customer_id FROM customer_info";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$max_customer_id = $row['max_customer_id'];

	$sql2 = "INSERT INTO customer_user_password (username, password, customer_ID)
	VALUES ('$Email', MD5('$Psw'), '$max_customer_id')";
	
	if (!mysqli_query($con,$sql2)) {
		die('Error: ' . mysqli_error($con));
	}
	
	
}	

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="login-register.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>