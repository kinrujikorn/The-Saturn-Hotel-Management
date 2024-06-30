<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// Retrieve user input from the login form
$Stid = mysqli_real_escape_string($con, $_POST['stid']);
$Stpsw = mysqli_real_escape_string($con, $_POST['stpsw']);

// Query the database to check user credentials
$sql = "SELECT * FROM staff_user_password WHERE staff_ID = '$Stid' AND password = MD5('$Stpsw')";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) == 1) {
    // Valid credentials, user authenticated
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $Stid;

    // Redirect to a protected page or provide access to the appropriate functionality
    header("Location: adminIndex.php");
    exit();
} else {
    // Invalid credentials, show error message or redirect to login page with an error message
    echo "<script>alert('Invalid username/email or password.');</script>";
    // Redirect to the login page or display an error message
    header("Location: login-staff.php");
    exit();
}
?> 