<?php
$servername = "127.0.0.1";  
$username = "root";   
$password = "";    
$dbname = "hotel_db"; 

// Create a connection to MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widp=device-widp, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Admin Customer</title>
    <style>
        html {
            display: block;
            margin: auto;
        }

        h1 {
            text-align: start;
            font-size: 30px;
            padding: 20px;
            margin-left: 150px;
        }

        table {
            font-family: arial, sans-serif;
            text-align: start;
            border-collapse: collapse;
            width: 100%;
        }

        p {
            padding: 10px;
            padding-top: 20px;
            text-align: start;
        }

        .liststy {
            border-bottom: 1px solid rgb(222, 215, 215);
            border-radius: 10px; 
            display: flex;
            max-width: 80%;
            justify-content: center;
            align-items: center;
            margin: auto;
        }
        .numsty {
            text-align: center;
        }
        

    .row p {
        flex: 1;
        text-align: center;
        margin: 0;
    }

    .liststy {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        max-width: 80%;
    }

    .liststy p {
        flex: 1;
        text-align: center;
        margin: 0;
    }
    
    
    </style>
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="menu-item" style="padding-top: 10px;padding-bottom: 10px;box-shadow: 0px 10px 10px rgba(36, 11, 12, 0.03);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="logo">
                            <a href="./index.php">
                                <img widp="100px" src="./img/Logo the saturn hotel.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                   <li><a href="./adminIndex.php">Home</a></li>
                                   <li><a href="./admin-room-list.php">Rooms</a></li>
                                   <li><a href="./admin-booking.php">Booking</a></li>
                                   <li><a href="./admin-payment.php">Payment</a></li> 
                                   <li class="active"><a href="./admin-customer.php">Customer</a></li> 
                                   <li><a href="./admin-seasons.php">Seasons</a></li>  
                                   <li><a href="./admin-staff.php">Staff</a></li>
                                   <li><a href="./analysis-report.php">Analysis Report</a></li>   
                                   <li><a href="./login-staff.php">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Header -->

    </header>
    <div>
        <h1>Customer Info</h1>
        <div>
        <?php
        $sql = "SELECT * FROM customer_info";

        // Execute the query and get the result
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
        // Start creating the HTML output
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #F3EEE8; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-2">Customer ID</p>';
        echo '<p class="col-lg-2">Customer Name</p>';
        echo '<p class="col-lg-2">Customer Last Name</p>';
        echo '<p class="col-lg-2">Customer Email</p>';
        echo '<p class="col-lg-2">Customer Phone</p>';
        echo '<p class="col-lg-2">Customer Gender</p>';
        echo '</div>';
    // Loop through the rows and display the data
        while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #FFFFFF; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-0.5">' . $row["customer_ID"] . '</p>';
        echo '<p class="col-lg-2">' . $row["customer_fName"] . '</p>';
        echo '<p class="col-lg-2">' . $row["customer_lName"] . '</p>';
        echo '<p class="col-lg-2">' . $row["customer_email"] . '</p>';
        echo '<p class="col-lg-2">' . $row["customer_phone"] . '</p>';
        echo '<p class="col-lg-2">' . $row["customer_gender"] . '</p>';
        echo '</div>';
        }
        } else {
        echo "No data found in the 'customers_info' table.";
        }
        ?>
        </div>

        <!-- <div class="liststy">
            <p class="col-lg-0.5">1</p>
            <p class="col-lg-2">RM00001</p>
            <p class="col-lg-2">Luxuary</p>
            <p class="col-lg-1">Empty</p>
            <p class="col-lg-1 numsty">2</p>
            <p class="col-lg-1">Cleaned</p>
            <p class="col-lg-1 numsty">2</p>
            <p class="col-lg-1">2500</p>
            <p class="col-lg-2">1 single bed 1 bap ja esud</p>
        </div> -->
    </div>
</body>

</html>