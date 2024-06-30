<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// Retrieve user input from the login form
$Email = mysqli_real_escape_string($con, $_POST['email']);
$Psw = mysqli_real_escape_string($con, $_POST['psw']);

// Query the database to check user credentials
$sql = "SELECT * FROM customer_user_password WHERE username = '$Email' AND password = MD5('$Psw')";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) == 1) {
    // Valid credentials, user authenticated
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $Email;

    // Redirect to a protected page or provide access to the appropriate functionality
    header("Location: index-already-login.php");
    exit();
} else {
    // Invalid credentials, show error message or redirect to login page with an error message
    echo "<script>alert('Invalid username/email or password.');</script>";
    // Redirect to the login page or display an error message
    header("Location: login-register.php");
    exit();
}
?> 